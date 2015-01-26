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
	 * subtitle
	 *
	 * @var string
	 */
	protected $subtitle = '';

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
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = '';

	/**
	 * imageMobile
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $imageMobile = NULL;

	/**
	 * teaser
	 *
	 * @var string
	 */
	protected $teaser = '';

	/**
	 * descriptionHeader
	 *
	 * @var string
	 */
	protected $descriptionHeader = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * sorting
	 *
	 * @var integer
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
	 * articles
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Article>
	 * @cascade remove
	 */
	protected $articles = NULL;

	/**
	 * kerning
	 *
	 * @var \Famelo\MelosRtb\Domain\Model\Kerning
	 */
	protected $kerning = NULL;

	/**
	 * parent
	 *
	 * @var \Famelo\MelosRtb\Domain\Model\Component
	 */
	protected $parent = NULL;

	/**
	 * children
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component>
	 * @cascade remove
	 */
	protected $children = NULL;

	/**
	 * colors
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Color>
	 * @cascade remove
	 */
	protected $colors = NULL;

	/**
	 * attributes
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Attribute>
	 * @cascade remove
	 */
	protected $attributes = NULL;

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
		$this->articles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->children = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->colors = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->attributes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
		if ($this->thumbnail !== NULL) {
			return $this->thumbnail;
		}
		if ($this->parent !== NULL) {
			return $this->parent->getThumbnail();
		}
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
	 * @param \Famelo\MelosRtb\Domain\Model\Article $article
	 * @return void
	 */
	public function addArticle(\Famelo\MelosRtb\Domain\Model\Article $article) {
		$this->articles->attach($article);
	}

	/**
	 * Removes a Article
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Article $articleToRemove The Article to be removed
	 * @return void
	 */
	public function removeArticle(\Famelo\MelosRtb\Domain\Model\Article $articleToRemove) {
		$this->articles->detach($articleToRemove);
	}

	/**
	 * Returns the articles
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Article> $articles
	 */
	public function getArticles() {
		return $this->articles;
	}

	/**
	 * Sets the articles
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Article> $articles
	 * @return void
	 */
	public function setArticles(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $articles) {
		$this->articles = $articles;
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
	 * Returns the parent
	 *
	 * @return \Famelo\MelosRtb\Domain\Model\Component $parent
	 */
	public function getParent() {
		return $this->parent;
	}

	public function getRootParent() {
		if ($this->parent === NULL) {
			return $this;
		}
		return $this->parent->getRootParent();
	}

	/**
	 * Sets the parent
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Component $parent
	 * @return void
	 */
	public function setParent(\Famelo\MelosRtb\Domain\Model\Component $parent) {
		$this->parent = $parent;
	}

	/**
	 * Adds a Component
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Component $child
	 * @return void
	 */
	public function addChild(\Famelo\MelosRtb\Domain\Model\Component $child) {
		$child->setParent($this);
		$this->children->attach($child);
	}

	/**
	 * Removes a Component
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Component $childToRemove The Component to be removed
	 * @return void
	 */
	public function removeChild(\Famelo\MelosRtb\Domain\Model\Component $childToRemove) {
		$this->children->detach($childToRemove);
	}

	/**
	 * Returns the children
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component> $children
	 */
	public function getChildren() {
		return $this->children;
	}

	/**
	 * Sets the children
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component> $children
	 * @return void
	 */
	public function setChildren(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $children) {
		$this->children = $children;
	}

	/**
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference image
	 */
	public function getImage() {
		if ($this->image !== NULL) {
			return $this->image;
		}
		if ($this->parent !== NULL) {
			return $this->parent->getImage();
		}
	}

	/**
	 * Sets the image
	 *
	 * @param string $image
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference image
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Returns the colors
	 */
	public function getColors() {
		$colors = array();
		foreach ($this->articles as $article) {
			$colors[] = $article->getColor();
		}
		return $colors;
	}

	/**
	 * Returns the imageMobile
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageMobile
	 */
	public function getImageMobile() {
		if ($this->imageMobile !== NULL) {
			return $this->imageMobile;
		}
		if ($this->parent !== NULL) {
			return $this->parent->getImageMobile();
		}
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

	public function getRelatedComponents() {
		$components = array();
		foreach ($this->getChildren() as $childComponent) {
			foreach ($childComponent->getSystems() as $system) {
				foreach ($system->getComponents() as $component) {
					if ($component->getKerning() !== NULL && $component->getParent() !== NULL) {
						$component = $component->getParent();
					}
					$components[$component->getCode()] = $component;
				}
			}
		}
		return $components;
	}

	public function getApplications() {
		$applications = array();
		foreach ($this->getChildren() as $childComponent) {
			foreach ($childComponent->getSystems() as $system) {
				foreach ($system->getApplications() as $application) {
					$applications[$application->getCode()] = $application;
				}
			}
		}
		return $applications;
	}

	/**
	 * Returns the sorting
	 *
	 * @return integer sorting
	 */
	public function getSorting() {
		return $this->sorting;
	}

	/**
	 * Sets the sorting
	 *
	 * @param string $sorting
	 * @return integer sorting
	 */
	public function setSorting($sorting) {
		$this->sorting = $sorting;
	}

	/**
	 * Returns the descriptionHeader
	 *
	 * @return string $descriptionHeader
	 */
	public function getDescriptionHeader() {
		return $this->descriptionHeader;
	}

	/**
	 * Sets the descriptionHeader
	 *
	 * @param string $descriptionHeader
	 * @return void
	 */
	public function setDescriptionHeader($descriptionHeader) {
		$this->descriptionHeader = $descriptionHeader;
	}

	/**
	 * Adds a Color
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Color $color
	 * @return void
	 */
	public function addColor(\Famelo\MelosRtb\Domain\Model\Color $color) {
		$this->colors->attach($color);
	}

	/**
	 * Removes a Color
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Color $colorToRemove The Color to be removed
	 * @return void
	 */
	public function removeColor(\Famelo\MelosRtb\Domain\Model\Color $colorToRemove) {
		$this->colors->detach($colorToRemove);
	}

	/**
	 * Sets the colors
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Color> $colors
	 * @return void
	 */
	public function setColors(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $colors) {
		$this->colors = $colors;
	}

	/**
	 * Adds a Attribute
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Attribute $attribute
	 * @return void
	 */
	public function addAttribute(\Famelo\MelosRtb\Domain\Model\Attribute $attribute) {
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

}