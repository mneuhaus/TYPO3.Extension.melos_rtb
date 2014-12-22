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
 * Application
 */
class Application extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 * 
	 * @var string
	 */
	protected $name = '';

	/**
	 * description
	 * 
	 * @var string
	 */
	protected $description = '';

	/**
	 * teaser
	 * 
	 * @var string
	 */
	protected $teaser = '';

	/**
	 * thumbnail
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $thumbnail = NULL;

	/**
	 * image
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;

	/**
	 * imageMobile
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $imageMobile = NULL;

	/**
	 * downloads
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 * @cascade remove
	 */
	protected $downloads = NULL;

	/**
	 * code
	 * 
	 * @var string
	 */
	protected $code = '';

	/**
	 * sorting
	 * 
	 * @var string
	 */
	protected $sorting = '';

	/**
	 * l10nParent
	 * 
	 * @var integer
	 */
	protected $l10nParent = 0;

	/**
	 * systems
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\System>
	 * @cascade remove
	 */
	protected $systems = NULL;

	/**
	 * subtitle
	 * 
	 * @var string
	 */
	protected $subtitle = '';

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
		$this->downloads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->systems = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Adds a FileReference
	 * 
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $download
	 * @return void
	 */
	public function addDownload(\TYPO3\CMS\Extbase\Domain\Model\FileReference $download) {
		$this->downloads->attach($download);
	}

	/**
	 * Removes a FileReference
	 * 
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $downloadToRemove The FileReference to be removed
	 * @return void
	 */
	public function removeDownload(\TYPO3\CMS\Extbase\Domain\Model\FileReference $downloadToRemove) {
		$this->downloads->detach($downloadToRemove);
	}

	/**
	 * Returns the downloads
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $downloads
	 */
	public function getDownloads() {
		return $this->downloads;
	}

	/**
	 * Sets the downloads
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $downloads
	 * @return void
	 */
	public function setDownloads(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $downloads) {
		$this->downloads = $downloads;
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
	 * Adds a ComponentUse
	 * 
	 * @param \Famelo\MelosRtb\Domain\Model\System $system
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\System> systems
	 */
	public function addSystem(\Famelo\MelosRtb\Domain\Model\System $system) {
		$this->systems->attach($system);
	}

	/**
	 * Removes a ComponentUse
	 * 
	 * @param \Famelo\MelosRtb\Domain\Model\System $systemToRemove The System to be removed
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\System> systems
	 */
	public function removeSystem(\Famelo\MelosRtb\Domain\Model\System $systemToRemove) {
		$this->systems->detach($systemToRemove);
	}

	/**
	 * Returns the systems
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\System> systems
	 */
	public function getSystems() {
		return $this->systems;
	}

	/**
	 * Sets the systems
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\System> $systems
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\System> systems
	 */
	public function setSystems(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $systems) {
		$this->systems = $systems;
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

	/**
	 * Returns the l10nParent
	 * 
	 * @return integer l10nParent
	 */
	public function getL10nParent() {
		return $this->l10nParent;
	}

	/**
	 * Sets the l10nParent
	 * 
	 * @param integer $l10nParent
	 * @return integer l10nParent
	 */
	public function setL10nParent($l10nParent) {
		$this->l10nParent = $l10nParent;
	}

	/**
	 * Returns the imageMobile
	 * 
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageMobile
	 */
	public function getImageMobile() {
		return $this->imageMobile;
	}

	/**
	 * Sets the imageMobile
	 * 
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageMobile
	 * @return void
	 */
	public function setImageMobile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $imageMobile) {
		$this->imageMobile = $imageMobile;
	}

	/**
	 * Returns the subtitle
	 * 
	 * @return string $subtitle
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * Sets the subtitle
	 * 
	 * @param string $subtitle
	 * @return void
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

}