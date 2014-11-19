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
				'entity' => '\Famelo\MelosRtb\Domain\Model\Article'
			),
			array(
				'sheet' => 0,
				'tableIdentifier' => 'Art - RGR',
				'entity' => '\Famelo\MelosRtb\Domain\Model\Article'
			),
			array(
				'sheet' => 0,
				'tableIdentifier' => 'Art - PUR',
				'entity' => '\Famelo\MelosRtb\Domain\Model\Article'
			)
		);
		$imports = $this->getTables($file, $imports);

		foreach ($imports as $import) {
			foreach ($import['rows'] as $row) {
				$existingObject = $this->findByCode($row['Code'], $import['entity']);
				if ($existingObject === NULL) {
					$existingObject = $this->objectManager->get($import['entity']);
					$existingObject->setCode($row['Code']);
				}

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
				$existingObject->setSorting($row['Sortierung']);
				$this->addOrUpdate($existingObject);
			}
		}
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
				$row = array();
				foreach ($cellIterator as $cell) {
					if (!is_null($cell)) {
						$row[] = $cell->getCalculatedValue();
					}
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