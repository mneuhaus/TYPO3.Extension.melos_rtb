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
		$this->importEntities($file);
		// $this->importRelations($file);
	}

	public function getEntityIndex($className) {
		$query = $this->persistenceManager->createQueryForType($className);
		$entities = array();
		foreach ($query->execute() as $entity) {
			$entities[$entity->getCode()] = $entity;
		}
		return $entities;
	}

	public function importEntities($file) {
		$imports = array(
			// array(
			// 	'sheet' => 'Systeme',
			// 	'tableIdentifier' => 'Weg über Systeme',
			// 	'entity' => '\Famelo\MelosRtb\Domain\Model\Component',
			// 	'codeParts' => array('Spezifi. 2', 'Spezifi. 3'),
			// 	'name' => 'Komponenten',
			// 	'parentField' => 'Spezifi. 2'
			// ),
			// array(
			// 	'sheet' => 'Systeme',
			// 	'tableIdentifier' => 'Weg über Systeme',
			// 	'entity' => '\Famelo\MelosRtb\Domain\Model\Component',
			// 	'codeParts' => array('Spezifi. 2', 'Spezifi. 3'),
			// 	'name' => 'Komponenten',
			// 	'parentField' => 'Spezifi. 2'
			// ),
			// array(
			// 	'sheet' => 'Systeme',
			// 	'tableIdentifier' => 'Weg über Systeme',
			// 	'entity' => '\Famelo\MelosRtb\Domain\Model\Component',
			// 	'codeParts' => array('Spezifi. 2'),
			// 	'name' => 'Komponenten',
			// 	'parentField' => 'Spezifi. 1'
			// ),
			// array(
			// 	'sheet' => 'Artikel',
			// 	'tableIdentifier' => 'Artikel PUR',
			// 	'entity' => '\Famelo\MelosRtb\Domain\Model\Article'
			// ),
			// array(
			// 	'sheet' => 'Artikel',
			// 	'tableIdentifier' => 'Artikel ATL',
			// 	'entity' => '\Famelo\MelosRtb\Domain\Model\Article'
			// ),
			// array(
			// 	'sheet' => 'Artikel',
			// 	'tableIdentifier' => 'Artikel CGR',
			// 	'table' => 'tx_melosrtb_domain_model_article',
			// 	'mode' => 'tce',
			// 	'codeParts' => array('Art', 'Körnung', 'Farbe'),
			// 	'implementation' => '\Famelo\MelosRtb\Import\ArticleImport',
			// 	'relations' => array(
			// 		array(
			// 			'className' => '\Famelo\MelosRtb\Domain\Model\Kerning',
			// 			'codeField' => 'Körnung',
			// 			'method' => 'setKerning'
			// 		)
			// 	)
			// ),
			// array(
			// 	'sheet' => 'Artikel',
			// 	'tableIdentifier' => 'Artikel CGR',
			// 	'table' => 'tx_melosrtb_domain_model_crosssection',
			// 	'mode' => 'tce',
			// 	'codeParts' => array('Art', 'Körnung', 'Farbe'),
			// 	'implementation' => '\Famelo\MelosRtb\Import\CrossSectionImport'
			// ),

			// array(
			// 	'sheet' => 'Index',
			// 	'tableIdentifier' => 'Systeme',
			// 	'table' => 'tx_melosrtb_domain_model_system',
			// 	'mode' => 'tce',
			// 	'implementation' => '\Famelo\MelosRtb\Import\GeneralItemImport'
			// ),
			// array(
			// 	'sheet' => 'Index',
			// 	'tableIdentifier' => 'Anwendungen',
			// 	'table' => 'tx_melosrtb_domain_model_application',
			// 	'mode' => 'tce',
			// 	'implementation' => '\Famelo\MelosRtb\Import\GeneralItemImport'
			// ),
			// array(
			// 	'sheet' => 'Index',
			// 	'tableIdentifier' => 'Komponent',
			// 	'table' => 'tx_melosrtb_domain_model_component',
			// 	'mode' => 'tce',
			// 	'implementation' => '\Famelo\MelosRtb\Import\GeneralItemImport'
			// ),
			// array(
			// 	'sheet' => 'Systeme',
			// 	'tableIdentifier' => 'Weg über Systeme',
			// 	'table' => 'tx_melosrtb_domain_model_component',
			// 	'mode' => 'tce',
			// 	'codeParts' => array('Spezifi. 2', 'Spezifi. 3'),
			// 	'implementation' => '\Famelo\MelosRtb\Import\SubComponentImport'
			// ),
			// array(
			// 	'sheet' => 'Index',
			// 	'tableIdentifier' => 'Art - CGR',
			// 	'table' => 'tx_melosrtb_domain_model_component',
			// 	'mode' => 'tce',
			// 	'implementation' => '\Famelo\MelosRtb\Import\GeneralItemImport'
			// ),
			// array(
			// 	'sheet' => 'Index',
			// 	'tableIdentifier' => 'Art - RGR',
			// 	'table' => 'tx_melosrtb_domain_model_component',
			// 	'mode' => 'tce',
			// 	'implementation' => '\Famelo\MelosRtb\Import\GeneralItemImport'
			// ),
			// array(
			// 	'sheet' => 'Index',
			// 	'tableIdentifier' => 'Art - PUR',
			// 	'table' => 'tx_melosrtb_domain_model_component',
			// 	'mode' => 'tce',
			// 	'implementation' => '\Famelo\MelosRtb\Import\GeneralItemImport'
			// ),
			// array(
			// 	'sheet' => 'Index',
			// 	'tableIdentifier' => 'Farben',
			// 	'table' => 'tx_melosrtb_domain_model_color',
			// 	'mode' => 'tce',
			// 	'implementation' => '\Famelo\MelosRtb\Import\GeneralItemImport'
			// ),
			// array(
			// 	'sheet' => 'Index',
			// 	'tableIdentifier' => 'Körnungen',
			// 	'table' => 'tx_melosrtb_domain_model_kerning',
			// 	'mode' => 'tce',
			// 	'implementation' => '\Famelo\MelosRtb\Import\GeneralItemImport'
			// ),

			// array(
			// 	'sheet' => 'Artikel',
			// 	'tableIdentifier' => 'Artikel PUR',
			// 	'table' => 'tx_melosrtb_domain_model_component',
			// 	'mode' => 'tce',
			// 	'codeParts' => array('Spezifikation'),
			// 	'implementation' => '\Famelo\MelosRtb\Import\PurAttributeImport'
			// ),
			array(
				'sheet' => 'Artikel',
				'tableIdentifier' => 'Artikel ATL',
				'table' => 'tx_melosrtb_domain_model_component',
				'mode' => 'tce',
				'codeParts' => array('Spezifikation'),
				'implementation' => '\Famelo\MelosRtb\Import\AtlAttributeImport'
			),
		);
		$imports = $this->getTables($file, $imports);

		foreach ($imports as $import) {
			if (isset($import['implementation'])) {
				$importer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance($import['implementation'], $import);
			}
			foreach ($import['rows'] as $row) {
				if (isset($import['codeParts'])) {
					$codeParts = array();
					foreach ($import['codeParts'] as $codePart) {
						if (trim($row[$codePart]) == '-') {
							continue;
						}
						$codeParts[] = $row[$codePart];
					}
					$row['Code'] = implode('.', $codeParts);
				}
				$mode = isset($import['mode']) ? $import['mode'] : 'extbase';

				if ($mode == 'extbase') {
					$this->importFromExtbase($row, $import);
				}

				if ($mode == 'tce') {
					$importer->process($row);
				}
			}
		}
	}

	// public function importFromExtbase($row, $import) {
	// 	$existingObject = $this->getObject($row, $import['entity']);
	// 	$values = array_values($row);
	// 	// echo 'Processing: ' . $values[1] . $values[2] . $values[3] . '<br />';
	// 	// ob_flush();

	// 	$this->addOrUpdate($existingObject, $mode);

	// 	if (isset($row['Bezeichnung EN'])) {
	// 		$translation = $this->getTranslation($existingObject);
	// 		if ($translation === NULL) {
	// 			$translation = $this->objectManager->get($import['entity']);
	// 			$translation->_setProperty('_languageUid', 1);
	// 			$translation->setL10nParent($existingObject->getUid());
	// 		}
	// 		$translation->setName($row['Bezeichnung EN']);
	// 		$this->addOrUpdate($translation, $mode);
	// 	}

	// 	if (isset($import['name'])) {
	// 		$existingObject->setName($row[$import['name']]);
	// 	} else {
	// 		$existingObject->setName($row['Bezeichnung']); //  . '(' . $import['sheet'] . ', ' . $import['tableIdentifier'] . ')'
	// 	}
	// 	if (isset($row['Sortierung'])) {
	// 		$existingObject->setSorting($row['Sortierung']);
	// 	}


	// 	if (isset($import['parentField'])) {
	// 		$import['componentCode'] = $row[$import['parentField']];
	// 	}

	// 	if (isset($import['componentCode'])) {
	// 		$component = $this->findByCode($import['componentCode'], '\Famelo\MelosRtb\Domain\Model\Component');
	// 		if ($component !== NULL) {
	// 			$component->addChild($existingObject);
	// 			$this->addOrUpdate($component, $mode);
	// 		}
	// 	}

	// 	if (isset($import['relations'])) {
	// 		foreach ($import['relations'] as $relation) {
	// 			$relatedObject = $this->findByCode($row[$relation['codeField']], $relation['className']);
	// 			if ($relatedObject !== NULL) {
	// 				call_user_method($relation['method'], $existingObject, $relatedObject);
	// 				$this->addOrUpdate($relatedObject);
	// 			}
	// 		}
	// 	}

	// 	switch ($import['entity']) {
	// 		case '\Famelo\MelosRtb\Domain\Model\Article':
	// 			// $attributes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	// 			// $existingObject->setAttributes($attributes);
	// 			// $filter = explode(',', 'Komponente,Art,Koernung,Farbe,Spezifikation,Eimer,Fass,IBC,Bezeichnung,Bezeichnung EN,Artikelnr.');
	// 			// foreach ($row as $key => $value) {
	// 			// 	if (in_array($key, $filter)) {
	// 			// 		continue;
	// 			// 	}
	// 			// 	if (empty($value) || trim($value) == '-') {
	// 			// 		continue;
	// 			// 	}
	// 			// 	$attribute = new \Famelo\MelosRtb\Domain\Model\Attribute();
	// 			// 	$attribute->setName($key);
	// 			// 	$attribute->setValue($value);
	// 			// 	$existingObject->addAttribute($attribute);
	// 			// }
	// 			break;
	// 	}

	// 	$this->addOrUpdate($existingObject);
	// }

	public function importRelations($file) {
		$relations = array(
			'rel1' => array(
				'sheet' => 'Anwendungen',
				'tableIdentifier' => 'Weg über Anwendungen',
			),
			'rel2' => array(
				'sheet' => 'Systeme',
				'tableIdentifier' => 'Weg über Systeme',
			)
		);
		$relations = $this->getTables($file, $relations);
		$applications = $this->getEntityIndex('\Famelo\MelosRtb\Domain\Model\Application');
		foreach ($applications as $application) {
			$attributes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$application->setSystems($attributes);
		}
		$systems = $this->getEntityIndex('\Famelo\MelosRtb\Domain\Model\System');
		foreach ($systems as $system) {
			$components = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$system->setComponents($components);
		}
		$components = $this->getEntityIndex('\Famelo\MelosRtb\Domain\Model\Component');
		foreach ($components as $component) {
			// $component->setArticles(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$component->setSystems(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
		}

		// $GLOBALS['TYPO3_DB']->exec_DELETEquery('tx_melosrtb_application_system_mm', '1=1');
		// $GLOBALS['TYPO3_DB']->exec_DELETEquery('tx_melosrtb_system_component_mm', '1=1');

		foreach ($relations['rel1']['rows'] as $row) {
			$application = $applications[$row['Anwendung']];
			$system = $systems[$row['Systeme']];
			if ($row['Systeme'] !== NULL) {
				// $application->addSystem($system);
				// $this->addOrUpdate($application);

				$GLOBALS['TYPO3_DB']->exec_DELETEquery('tx_melosrtb_application_system_mm', 'uid_local = ' . $application->getUid() . ' AND uid_foreign = ' . $system->getUid());
				$res=$GLOBALS['TYPO3_DB']->exec_INSERTquery(
					'tx_melosrtb_application_system_mm',
					array(
						'uid_local' => $application->getUid(),
						'uid_foreign' => $system->getUid()
					)
				);
			}

			$keys = array();
			foreach (array('Spezifikation 2', 'Spezifikation 3') as $key) {
				if (trim($row[$key]) === '-' || empty($row[$key])) {
					continue;
				}
				$keys[] = $row[$key];
			}
			$key = implode('.', $keys);
			$component = $components[$key];
			if ($component !== NULL) {
				// $system->addComponent($component);
				// $this->addOrUpdate($system);

				$GLOBALS['TYPO3_DB']->exec_DELETEquery('tx_melosrtb_system_component_mm', 'uid_local = ' . $system->getUid() . ' AND uid_foreign = ' . $component->getUid());
				$res=$GLOBALS['TYPO3_DB']->exec_INSERTquery(
					'tx_melosrtb_system_component_mm',
					array(
						'uid_local' => $system->getUid(),
						'uid_foreign' => $component->getUid()
					)
				);
			}
		}
	}

	public function getObject($row, $className, $autoCreate = TRUE) {
		switch ($className) {
			case '\Famelo\MelosRtb\Domain\Model\Article':
				$keys = array(
					'component' => 'Komponente',
					'articleGroup' => 'Art',
					'kerning' => 'Koernung',
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
				if (trim($value) == '-') {
					continue;
				}
				if (empty($value)) {
					continue;
				}
				if (class_exists($propertyType)) {
					$value = $this->getObject(array('Code' => $value), $propertyType, FALSE);
				}
				// var_dump($column . ': ' . $value);
				$key = strtolower(preg_replace('/([^A-Z])([A-Z])/', "$1_$2", $key));
				// var_dump($propertyType, $key, $row[$column], $value);
				// echo '<br />';
				$conditions[] = $query->equals($key, $value);
			}
		}
		if (empty($conditions)) {
			var_dump($keys, $row);
			exit();
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
				if (trim($value) == '-') {
					continue;
				}
				if (class_exists($propertyType)) {
					$value = $this->getObject(array('Code' => $value), $propertyType, FALSE);
					if ($value === NULL) {
						continue;
					}
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
			if (is_int($tableSource['sheet'])) {
				$worksheet = $xls->getSheet($tableSource['sheet']);
			} else {
				$worksheet = $xls->getSheetByName($tableSource['sheet']);
			}
			$collecting = FALSE;
			$seeking = FALSE;
			$rows = array();
			foreach ($worksheet->getRowIterator() as $sheetRow) {
				$header = $worksheet->getCell('A' . $sheetRow->getRowIndex())->getValue();
				if ($header !== $tableSource['tableIdentifier'] && $collecting == FALSE) {
					continue;
				}
				if ($collecting === FALSE) {
					$collecting = TRUE;
					$seeking = TRUE;
					continue;
				}
				$cellIterator = $sheetRow->getCellIterator();
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

				$firstCellValue = $worksheet->getCell('A' . $sheetRow->getRowIndex())->getCalculatedValue();
				if ($firstCellValue === NULL || $firstCellValue === 'Codierung') {
					continue;
				}

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