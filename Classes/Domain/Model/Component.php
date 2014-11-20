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
 * Component
 */
class Component extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

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
	 * thumbnail
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $thumbnail = NULL;

	/**
	 * image
	 *
	 * @var string
	 */
	protected $image = '';

	/**
	 * teaser
	 *
	 * @var string
	 */
	protected $teaser = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

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
	 * articleGroups
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\ArticleGroup>
	 * @cascade remove
	 */
	protected $articleGroups = NULL;

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
		$this->systems = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->articleGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * @return string $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param string $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
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
	 * @return integer $l10nParent
	 */
	public function getL10nParent() {
		return $this->l10nParent;
	}

	/**
	 * Sets the l10nParent
	 *
	 * @param integer $l10nParent
	 * @return void
	 */
	public function setL10nParent($l10nParent) {
		$this->l10nParent = $l10nParent;
	}

	/**
	 * Adds a Article
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\ArticleGroup $articleGroup
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\ArticleGroup> articleGroups
	 */
	public function addArticleGroup(\Famelo\MelosRtb\Domain\Model\ArticleGroup $articleGroup) {
		if ($this->articleGroups === NULL) {
			$this->articleGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}
		$articleGroup->setComponent($this);
		$this->articleGroups->attach($articleGroup);
	}

	/**
	 * Removes a Article
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\ArticleGroup $articleGroupToRemove The ArticleGroup to be removed
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\ArticleGroup> articleGroups
	 */
	public function removeArticleGroup(\Famelo\MelosRtb\Domain\Model\ArticleGroup $articleGroupToRemove) {
		$this->articleGroups->detach($articleGroupToRemove);
	}

	/**
	 * Returns the articleGroups
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\ArticleGroup> articleGroups
	 */
	public function getArticleGroups() {
		return $this->articleGroups;
	}

	/**
	 * Sets the articleGroups
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\ArticleGroup> $articleGroups
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\ArticleGroup> articleGroups
	 */
	public function setArticleGroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $articleGroups) {
		$this->articleGroups = $articleGroups;
	}

}