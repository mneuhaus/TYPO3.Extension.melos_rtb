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
	 * mobileImage
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $mobileImage = NULL;

	/**
	 * crossSection
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $crossSection = NULL;

	/**
	 * crossSectionMobile
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $crossSectionMobile = NULL;

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
	 * l10nParent
	 *
	 * @var integer
	 */
	protected $l10nParent = 0;

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
	 * articles
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Article>
	 */
	protected $articles = NULL;

	/**
	 * crossSections
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\CrossSection>
	 * @cascade remove
	 */
	protected $crossSections = NULL;

	/**
	 * descriptionHeader
	 *
	 * @var string
	 */
	protected $descriptionHeader = '';

	/**
	 * requirement
	 *
	 * @var integer
	 */
	protected $requirement = 0;

	/**
	 * cost
	 *
	 * @var string
	 */
	protected $cost = '';

	/**
	 * synonym
	 *
	 * @var string
	 */
	protected $synonym = '';

	/**
	 * featureDescription
	 *
	 * @var string
	 */
	protected $featureDescription = '';

	/**
	 * application
	 *
	 * @var string
	 */
	protected $application = '';

	/**
	 * standard
	 *
	 * @var string
	 */
	protected $standard = '';

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
		$this->articles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->crossSections = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
		$component->addSystem($this);
		if (!$this->components->contains($component)) {
			$this->components->attach($component);
		}
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
	 * Removes a ComponentUse
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Component $component The Component to be removed
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\Component> components
	 */
	public function hasComponent(\Famelo\MelosRtb\Domain\Model\Component $component) {
		return $this->components->contains($component);
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

	public function getColors() {
		$colors = array();
		foreach ($this->components as $component) {
			foreach ($component->getColors() as $color) {
				if (is_object($color)) {
					$colors[$color->getCode()] = $color;
				}
			}
		}
		return $colors;
	}

	/**
	 * Returns the mobileImage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $mobileImage
	 */
	public function getMobileImage() {
		return $this->mobileImage;
	}

	/**
	 * Sets the mobileImage
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $mobileImage
	 * @return void
	 */
	public function setMobileImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $mobileImage) {
		$this->mobileImage = $mobileImage;
	}

	/**
	 * Returns the crossSection
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $crossSection
	 */
	public function getCrossSection() {
		return $this->crossSection;
	}

	/**
	 * Sets the crossSection
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $crossSection
	 * @return void
	 */
	public function setCrossSection(\TYPO3\CMS\Extbase\Domain\Model\FileReference $crossSection) {
		$this->crossSection = $crossSection;
	}

	/**
	 * Returns the crossSectionMobile
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $crossSectionMobile
	 */
	public function getCrossSectionMobile() {
		return $this->crossSectionMobile;
	}

	/**
	 * Sets the crossSectionMobile
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $crossSectionMobile
	 * @return void
	 */
	public function setCrossSectionMobile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $crossSectionMobile) {
		$this->crossSectionMobile = $crossSectionMobile;
	}

	/**
	 * Adds a CrossSection
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\CrossSection $crossSection
	 * @return void
	 */
	public function addCrossSection(\Famelo\MelosRtb\Domain\Model\CrossSection $crossSection) {
		$this->crossSections->attach($crossSection);
	}

	/**
	 * Removes a CrossSection
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\CrossSection $crossSectionToRemove The CrossSection to be removed
	 * @return void
	 */
	public function removeCrossSection(\Famelo\MelosRtb\Domain\Model\CrossSection $crossSectionToRemove) {
		$this->crossSections->detach($crossSectionToRemove);
	}

	/**
	 * Returns the crossSections
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\CrossSection> $crossSections
	 */
	public function getCrossSections() {
		return $this->crossSections;
	}

	/**
	 * Sets the crossSections
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Famelo\MelosRtb\Domain\Model\CrossSection> $crossSections
	 * @return void
	 */
	public function setCrossSections(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $crossSections) {
		$this->crossSections = $crossSections;
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
	 * Returns the requirement
	 *
	 * @return integer $requirement
	 */
	public function getRequirement() {
		return $this->requirement;
	}

	/**
	 * Sets the requirement
	 *
	 * @param integer $requirement
	 * @return void
	 */
	public function setRequirement($requirement) {
		$this->requirement = $requirement;
	}

	/**
	 * Returns the cost
	 *
	 * @return string $cost
	 */
	public function getCost() {
		return $this->cost;
	}

	/**
	 * Sets the cost
	 *
	 * @param string $cost
	 * @return void
	 */
	public function setCost($cost) {
		$this->cost = $cost;
	}

	/**
	 * Returns the synonym
	 *
	 * @return string $synonym
	 */
	public function getSynonym() {
		return $this->synonym;
	}

	/**
	 * Sets the synonym
	 *
	 * @param string $synonym
	 * @return void
	 */
	public function setSynonym($synonym) {
		$this->synonym = $synonym;
	}

	/**
	 * Returns the featureDescription
	 *
	 * @return string $featureDescription
	 */
	public function getFeatureDescription() {
		return $this->featureDescription;
	}

	/**
	 * Sets the featureDescription
	 *
	 * @param string $featureDescription
	 * @return void
	 */
	public function setFeatureDescription($featureDescription) {
		$this->featureDescription = $featureDescription;
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
	 * Returns the standard
	 *
	 * @return string $standard
	 */
	public function getStandard() {
		return $this->standard;
	}

	/**
	 * Sets the standard
	 *
	 * @param string $standard
	 * @return void
	 */
	public function setStandard($standard) {
		$this->standard = $standard;
	}

}