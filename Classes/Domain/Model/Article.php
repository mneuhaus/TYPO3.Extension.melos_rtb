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
 * Article
 */
class Article extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * number
	 *
	 * @var string
	 */
	protected $number = '';

	/**
	 * specification
	 *
	 * @var string
	 */
	protected $specification = '';

	/**
	 * l10nParent
	 *
	 * @var integer
	 */
	protected $l10nParent = 0;

	/**
	 * articleGroup
	 *
	 * @var \Famelo\MelosRtb\Domain\Model\ArticleGroup
	 */
	protected $articleGroup = NULL;

	/**
	 * kerning
	 *
	 * @var \Famelo\MelosRtb\Domain\Model\Kerning
	 */
	protected $kerning = NULL;

	/**
	 * color
	 *
	 * @var \Famelo\MelosRtb\Domain\Model\Color
	 */
	protected $color = NULL;

	/**
	 * attributes
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Attribute>
	 * @cascade remove
	 */
	protected $attributes = NULL;

	/**
	 * component
	 *
	 * @var \Famelo\MelosRtb\Domain\Model\Component
	 */
	protected $component = NULL;

	/**
	 * system
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\System>
	 */
	protected $system = NULL;

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
		$this->attributes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->system = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the number
	 *
	 * @return string $number
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * Sets the number
	 *
	 * @param string $number
	 * @return void
	 */
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * Returns the specification
	 *
	 * @return string $specification
	 */
	public function getSpecification() {
		return $this->specification;
	}

	/**
	 * Sets the specification
	 *
	 * @param string $specification
	 * @return void
	 */
	public function setSpecification($specification) {
		$this->specification = $specification;
	}

	/**
	 * Returns the articleGroup
	 *
	 * @return \Famelo\MelosRtb\Domain\Model\ArticleGroup $articleGroup
	 */
	public function getArticleGroup() {
		return $this->articleGroup;
	}

	/**
	 * Sets the articleGroup
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\ArticleGroup $articleGroup
	 * @return void
	 */
	public function setArticleGroup(\Famelo\MelosRtb\Domain\Model\ArticleGroup $articleGroup) {
		$this->articleGroup = $articleGroup;
	}

	/**
	 * Returns the kerning
	 *
	 * @return \Famelo\MelosRtb\Domain\Model\Kerning $kerning
	 */
	public function getKerning() {
		return $this->kerning;
	}

	/**
	 * Sets the kerning
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Kerning $kerning
	 * @return void
	 */
	public function setKerning(\Famelo\MelosRtb\Domain\Model\Kerning $kerning) {
		$this->kerning = $kerning;
	}

	/**
	 * Returns the color
	 *
	 * @return \Famelo\MelosRtb\Domain\Model\Color $color
	 */
	public function getColor() {
		return $this->color;
	}

	/**
	 * Sets the color
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Color $color
	 * @return void
	 */
	public function setColor(\Famelo\MelosRtb\Domain\Model\Color $color) {
		$this->color = $color;
	}

	/**
	 * Adds a Attribute
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Attribute $attribute
	 * @return void
	 */
	public function addAttribute(\Famelo\MelosRtb\Domain\Model\Attribute $attribute) {
		$attribute->setArticle($this);
		$this->attributes->attach($attribute);
	}

	/**
	 * Removes a Attribute
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Attribute $attributeToRemove The Attribute to be removed
	 * @return void
	 */
	public function removeAttribute(\Famelo\MelosRtb\Domain\Model\Attribute $attributeToRemove) {
		$this->attributes->detach($attributeToRemove);
	}

	/**
	 * Returns the attributes
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Attribute> $attributes
	 */
	public function getAttributes() {
		return $this->attributes;
	}

	/**
	 * Sets the attributes
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Attribute> $attributes
	 * @return void
	 */
	public function setAttributes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $attributes) {
		$this->attributes = $attributes;
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
	 * Returns the component
	 *
	 * @return \Famelo\MelosRtb\Domain\Model\Component $component
	 */
	public function getComponent() {
		return $this->component;
	}

	/**
	 * Sets the component
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Component $component
	 * @return void
	 */
	public function setComponent(\Famelo\MelosRtb\Domain\Model\Component $component) {
		$this->component = $component;
	}

	/**
	 * Adds a System
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\System $system
	 * @return void
	 */
	public function addSystem(\Famelo\MelosRtb\Domain\Model\System $system) {
		$this->system->attach($system);
	}

	/**
	 * Removes a System
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\System $systemToRemove The System to be removed
	 * @return void
	 */
	public function removeSystem(\Famelo\MelosRtb\Domain\Model\System $systemToRemove) {
		$this->system->detach($systemToRemove);
	}

	/**
	 * Returns the system
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\System> $system
	 */
	public function getSystem() {
		return $this->system;
	}

	/**
	 * Sets the system
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\System> $system
	 * @return void
	 */
	public function setSystem(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $system) {
		$this->system = $system;
	}

}