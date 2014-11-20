<?php
namespace Famelo\MelosRtb\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Marc Neuhaus
<mneuhaus@famelo.com>, Famelo
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use \TYPO3\CMS\Extbase\Reflection\ObjectAccess;

require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('melos_rtb') . '/Resources/Private/PHP/phpexcel/Classes/PHPExcel/IOFactory.php');

/**
 * ApplicationController
 */
class ImportController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
	 * @inject
	 */
	protected $persistenceManager = NULL;

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 * @inject
	 */
	protected $objectManager;

	/**
	 * @var \TYPO3\CMS\Extbase\Reflection\ReflectionService
	 * @inject
	 */
	protected $reflectionService;

	/**
	 * action index
	 *
	 * @return void
	 */
	public function indexAction() {
		$files = \TYPO3\CMS\Core\Utility\GeneralUtility::getFilesInDir(PATH_site . '/fileadmin', 'xls,xlsx');
		$this->view->assign('files', $files);
	}

	/**
	 * action index
	 *
	 * @param string $file
	 * @return void
	 */
	public function importAction($file) {
		$imports = array(
			array(
				'sheet' => 0,
				'tableIdentifier' => 'Anwendungen',
				'entity' => '\Famelo\MelosRtb\Domain\Model\Application',
			),
			array(
				'sheet' => 0,
				'tableIdentifier' => 'Systeme',
				'entity' => '\Famelo\MelosRtb\Domain\Model\System'
			),
			array(
				'sheet' => 0,
				'tableIdentifier' => 'Komponenten',
				'entity' => '\Famelo\MelosRtb\Domain\Model\Component'
			),
			array(
				'sheet' => 0,
				'tableIdentifier' => 'Farben',
				'entity' => '\Famelo\MelosRtb\Domain\Model\Color'
			),
			array(
				'sheet' => 0,
				'tableIdentifier' => 'Art - CGR',
				'entity' => '\Famelo\MelosRtb\Domain\Model\ArticleGroup',
				'componentCode' => 'CGR'
			),
			array(
				'sheet' => 0,
				'tableIdentifier' => 'Art - RGR',
				'entity' => '\Famelo\MelosRtb\Domain\Model\ArticleGroup',
				'componentCode' => 'RGR'
			),
			array(
				'sheet' => 0,
				'tableIdentifier' => 'Art - PUR',
				'entity' => '\Famelo\MelosRtb\Domain\Model\ArticleGroup',
				'componentCode' => 'PUR'
			),
			array(
				'sheet' => 0,
				'tableIdentifier' => 'Körnungen',
				'entity' => '\Famelo\MelosRtb\Domain\Model\Kerning'
			),
			array(
				'sheet' => 3,
				'tableIdentifier' => 'Artikel',
				'entity' => '\Famelo\MelosRtb\Domain\Model\Article'
			),
			array(
				'sheet' => 3,
				'tableIdentifier' => 'Artikel PUR',
				'entity' => '\Famelo\MelosRtb\Domain\Model\Article'
			)
		);
		$imports = $this->getTables($file, $imports);

		foreach ($imports as $import) {
			// var_dump($import);
			// return;
			foreach ($import['rows'] as $row) {
				$existingObject = $this->getObject($row, $import['entity']);

				$this->addOrUpdate($existingObject);

				if (isset($row['Bezeichnung EN'])) {
					$translation = $this->getTranslation($existingObject);
					if ($translation === NULL) {
						$translation = $this->objectManager->get($import['entity']);
						$translation->_setProperty('_languageUid', 1);
						$translation->setL10nParent($existingObject->getUid());
					}
					$translation->setName($row['Bezeichnung EN']);
					$this->addOrUpdate($translation);
				}

				$existingObject->setName($row['Bezeichnung']);
				if (isset($row['Sortierung'])) {
					$existingObject->setSorting($row['Sortierung']);
				}

				switch ($import['entity']) {
					case '\Famelo\MelosRtb\Domain\Model\ArticleGroup':
						$component = $this->findByCode($import['componentCode'], '\Famelo\MelosRtb\Domain\Model\Component');
						$component->addArticleGroup($existingObject);
						$this->addOrUpdate($component);
						break;

					case '\Famelo\MelosRtb\Domain\Model\Article':
						$attributes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
						$existingObject->setAttributes($attributes);
						$filter = explode(',', 'Komponente,Art,Koernung,Farbe,Spezifikation,Eimer,Fass,IBC,Bezeichnung,Bezeichnung EN,Artikelnr.');
						foreach ($row as $key => $value) {
							if (in_array($key, $filter)) {
								continue;
							}
							if (empty($value) || trim($value) == '-') {
								continue;
							}
							$attribute = new \Famelo\MelosRtb\Domain\Model\Attribute();
							$attribute->setName($key);
							$attribute->setValue($value);
							$existingObject->addAttribute($attribute);
						}
						break;
				}

				$this->addOrUpdate($existingObject);
			}
		}
	}

	public function getObject($row, $className, $autoCreate = TRUE) {
		switch ($className) {
			case '\Famelo\MelosRtb\Domain\Model\Article':
				$keys = array(
					'articleGroup' => 'Art',
					'kerning' => 'Körnung',
					'color' => 'Farbe',
					'specification' => 'Spezifikation'
				);
				break;
			default:
				$keys = array('code' => 'Code');
		}

		$query = $this->createQuery($row, $keys, $className);
		$existingObject = $query->execute()->getFirst();
		if ($existingObject === NULL && $autoCreate) {
			$existingObject = $this->createObject($row, $className, $keys);
		}

		return $existingObject;
	}

	public function createQuery($row, $keys, $className) {
		$query = $this->persistenceManager->createQueryForType($className);
		$conditions = array();
		foreach ($keys as $key => $column) {
			if (isset($row[$column])) {
				$propertyType = $this->getPropertyType($key, $className);
				$value = $row[$column];
				if (class_exists($propertyType)) {
					$value = $this->getObject(array('Code' => $value), $propertyType, FALSE);
				}
				$key = strtolower(preg_replace('/([^A-Z])([A-Z])/', "$1_$2", $key));
				$conditions[] = $query->equals($key, $value);
			}
		}
		$query->matching($query->logicalAnd($conditions));
		return $query;
	}

	public function createObject($row, $className, $keys) {
		$existingObject = $this->objectManager->get($className);
		// $existingObject->setNumber($row['Artikelnr.']);

		foreach ($keys as $key => $column) {
			if (isset($row[$column])) {
				$propertyType = $this->getPropertyType($key, $className);
				$value = $row[$column];
				if (class_exists($propertyType)) {
					$value = $this->getObject(array('Code' => $value), $propertyType, FALSE);
				}
				ObjectAccess::setProperty($existingObject, $key, $value);
			}
		}
		return $existingObject;
	}

	public function getPropertyType($key, $className) {
		$tags = $this->reflectionService->getPropertyTagsValues($className, $key);

		return current($tags['var']);
	}

	public function getTables($file, $tables) {
		$xls = \PHPExcel_IOFactory::load(PATH_site . '/fileadmin/' . $file);
		foreach ($tables as $key => $tableSource) {
			$worksheet = $xls->getSheet($tableSource['sheet']);
			$collecting = FALSE;
			$seeking = FALSE;
			$rows = array();
			foreach ($worksheet->getRowIterator() as $row) {
				$header = $worksheet->getCell('A' . $row->getRowIndex())->getValue();
				if ($header !== $tableSource['tableIdentifier'] && $collecting == FALSE) {
					continue;
				}
				if ($collecting === FALSE) {
					$collecting = TRUE;
					$seeking = TRUE;
					continue;
				}
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(FALSE);
				$row = array();
				foreach ($cellIterator as $cell) {
					// if (!is_null($cell)) {
						$row[] = $cell->getCalculatedValue();
					// }
				}

				if ($seeking === TRUE && $this->emptyArray($row)) {
					continue;
				}
				if ($seeking === FALSE && $this->emptyArray($row)) {
					break;
				}
				$seeking = FALSE;
				$rows[] = $row;
			}

			$tables[$key]['rows'] = $this->rowHeaderConversion($rows);
		}
		return $tables;
	}

	public function rowHeaderConversion($rows) {
		$header = array_shift($rows);
		$newRows = array();
		foreach ($rows as $row) {
			$newRow = array();
			foreach ($header as $key => $value) {
				$newRow[$value] = $row[$key];
			}
			$newRows[] = $newRow;
		}
		return $newRows;
	}

	public function emptyArray($array) {
		foreach ($array as $key => $value) {
			if (!empty($value)) {
				return FALSE;
			}
		}
		return TRUE;
	}

	public function findByCode($code, $entity) {
		$query = $this->persistenceManager->createQueryForType($entity);
		$query->matching($query->equals('code', $code));
		return $query->execute()->getFirst();
	}

	public function addOrUpdate($object) {
		if ($this->persistenceManager->isNewObject($object)) {
			$this->persistenceManager->add($object);
		} else {
			$this->persistenceManager->update($object);
		}
		$this->persistenceManager->persistAll();
	}

	public function getTranslation($existingObject) {
		$query = $this->persistenceManager->createQueryForType(get_class($existingObject));
		$query->matching($query->equals('l10n_parent', $existingObject->getUid()));
		$query->getQuerySettings()->setRespectSysLanguage(FALSE);
		return $query->execute()->getFirst();
	}
}