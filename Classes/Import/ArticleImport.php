<?php
namespace Famelo\MelosRtb\Import;

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

/**
 * ApplicationController
 */
class ArticleImport {
	/**
	 * @var array
	 */
	protected $configuration = array();

	/**
	 * @var string
	 */
	protected $mapping = array(
		'number' => 'Artikelnr.',
		'name' => 'Bezeichnung',
		'color' => 'Farbe',
		'kerning' => 'Körnung',
		'component' => 'Art',
		'code' => 'Code'
	);

	public function __construct($configuration) {
		$this->configuration = $configuration;
	}

	public function process($row) {
		$fields = array(
			'pid' => 5
		);
		$this->row = $row;

		foreach ($this->mapping as $local => $foreign) {
			$fields[$local] = $row[$foreign];
			$converMethod = 'convert' . ucfirst($local);
			if (method_exists($this, $converMethod)) {
				$fields[$local] = call_user_method($converMethod, $this, $fields[$local]);
			}
		}
		$this->importOrUpdate($fields);
	}

	public function importOrUpdate($fields) {
		$existing = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
			'*',
			$this->configuration['table'],
			'code = "' . $fields['code'] . '"'
		);
		$uid = 'NEW';
		if (count($existing) > 0) {
			$uid = $existing[0]['uid'];
		}

		$data = array();
		$data[$this->configuration['table']][$uid] = $fields;
		$tce = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('t3lib_TCEmain');
		$tce->start($data, array());
		$tce->process_datamap();
	}

	public function convertColor($input) {
		$rows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
			'*',
			'tx_melosrtb_domain_model_color',
			'code = "' . $input . '"'
		);
		if (count($rows) > 0) {
			return $rows[0]['uid'];
		}
	}

	public function convertKerning($input) {
		$rows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
			'*',
			'tx_melosrtb_domain_model_kerning',
			'code = "' . $input . '"'
		);
		if (count($rows) > 0) {
			return $rows[0]['uid'];
		}
	}

	public function convertComponent($input) {
		$rows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
			'*',
			'tx_melosrtb_domain_model_component',
			'code = "' . $input . '.' . $this->row['Körnung'] . '"'
		);
		if (count($rows) > 0) {
			return $rows[0]['uid'];
		}
	}
}