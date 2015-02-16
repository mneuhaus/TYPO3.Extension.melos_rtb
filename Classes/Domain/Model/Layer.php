<?php
namespace Famelo\MelosRtb\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Marc Neuhaus <mneuhaus@famelo.com>, Famelo
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

/**
 * Layer
 */
class Layer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * note
	 *
	 * @var string
	 */
	protected $note = '';

	/**
	 * applicationRate
	 *
	 * @var string
	 */
	protected $applicationRate = '';

	/**
	 * application
	 *
	 * @var string
	 */
	protected $application = '';

	/**
	 * products
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component>
	 */
	protected $products = NULL;

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the note
	 *
	 * @return string $note
	 */
	public function getNote() {
		return $this->note;
	}

	/**
	 * Sets the note
	 *
	 * @param string $note
	 * @return void
	 */
	public function setNote($note) {
		$this->note = $note;
	}

	/**
	 * Returns the applicationRate
	 *
	 * @return string $applicationRate
	 */
	public function getApplicationRate() {
		return $this->applicationRate;
	}

	/**
	 * Sets the applicationRate
	 *
	 * @param string $applicationRate
	 * @return void
	 */
	public function setApplicationRate($applicationRate) {
		$this->applicationRate = $applicationRate;
	}

	/**
	 * Returns the application
	 *
	 * @return string $application
	 */
	public function getApplication() {
		return $this->application;
	}

	/**
	 * Sets the application
	 *
	 * @param string $application
	 * @return void
	 */
	public function setApplication($application) {
		$this->application = $application;
	}

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->products = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Component
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Component $product
	 * @return void
	 */
	public function addProduct(\Famelo\MelosRtb\Domain\Model\Component $product) {
		$this->products->attach($product);
	}

	/**
	 * Removes a Component
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Component $productToRemove The Component to be removed
	 * @return void
	 */
	public function removeProduct(\Famelo\MelosRtb\Domain\Model\Component $productToRemove) {
		$this->products->detach($productToRemove);
	}

	/**
	 * Returns the products
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component> $products
	 */
	public function getProducts() {
		return $this->products;
	}

	/**
	 * Sets the products
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component> $products
	 * @return void
	 */
	public function setProducts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $products) {
		$this->products = $products;
	}

}