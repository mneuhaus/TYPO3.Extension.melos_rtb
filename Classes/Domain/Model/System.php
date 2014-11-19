<?php
namespace Famelo\MelosRtb\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Marc Neuhaus <mneuhaus@famelo.com>, Famelo
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
 * System
 */
class System extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * code
	 *
	 * @var string
	 */
	protected $code = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;

	/**
	 * thumbnail
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $thumbnail = NULL;

	/**
	 * teaser
	 *
	 * @var string
	 */
	protected $teaser = '';

	/**
	 * sorting
	 *
	 * @var string
	 */
	protected $sorting = '';

	/**
	 * components
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component>
	 * @cascade remove
	 */
	protected $components = NULL;

	/**
	 * applications
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Application>
	 */
	protected $applications = NULL;

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
		$this->components = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->applications = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

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
	 * Returns the code
	 *
	 * @return string $code
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * Sets the code
	 *
	 * @param string $code
	 * @return void
	 */
	public function setCode($code) {
		$this->code = $code;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
		$this->image = $image;
	}

	/**
	 * Returns the thumbnail
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $thumbnail
	 */
	public function getThumbnail() {
		return $this->thumbnail;
	}

	/**
	 * Sets the thumbnail
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $thumbnail
	 * @return void
	 */
	public function setThumbnail(\TYPO3\CMS\Extbase\Domain\Model\FileReference $thumbnail) {
		$this->thumbnail = $thumbnail;
	}

	/**
	 * Returns the teaser
	 *
	 * @return string $teaser
	 */
	public function getTeaser() {
		return $this->teaser;
	}

	/**
	 * Sets the teaser
	 *
	 * @param string $teaser
	 * @return void
	 */
	public function setTeaser($teaser) {
		$this->teaser = $teaser;
	}

	/**
	 * Adds a ComponentUse
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Component $component
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component> components
	 */
	public function addComponent(\Famelo\MelosRtb\Domain\Model\Component $component) {
		$this->components->attach($component);
	}

	/**
	 * Removes a ComponentUse
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Component $componentToRemove The Component to be removed
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component> components
	 */
	public function removeComponent(\Famelo\MelosRtb\Domain\Model\Component $componentToRemove) {
		$this->components->detach($componentToRemove);
	}

	/**
	 * Returns the components
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component> components
	 */
	public function getComponents() {
		return $this->components;
	}

	/**
	 * Sets the components
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component> $components
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component> components
	 */
	public function setComponents(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $components) {
		$this->components = $components;
	}

	/**
	 * Adds a Application
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Application $application
	 * @return void
	 */
	public function addApplication(\Famelo\MelosRtb\Domain\Model\Application $application) {
		$this->applications->attach($application);
	}

	/**
	 * Removes a Application
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Application $applicationToRemove The Application to be removed
	 * @return void
	 */
	public function removeApplication(\Famelo\MelosRtb\Domain\Model\Application $applicationToRemove) {
		$this->applications->detach($applicationToRemove);
	}

	/**
	 * Returns the applications
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Application> $applications
	 */
	public function getApplications() {
		return $this->applications;
	}

	/**
	 * Sets the applications
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Application> $applications
	 * @return void
	 */
	public function setApplications(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $applications) {
		$this->applications = $applications;
	}

	/**
	 * Returns the sorting
	 *
	 * @return string $sorting
	 */
	public function getSorting() {
		return $this->sorting;
	}

	/**
	 * Sets the sorting
	 *
	 * @param string $sorting
	 * @return void
	 */
	public function setSorting($sorting) {
		$this->sorting = $sorting;
	}

}