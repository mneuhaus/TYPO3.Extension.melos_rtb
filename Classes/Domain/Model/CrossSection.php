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
 * CrossSection
 */
class CrossSection extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

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
	 * system
	 *
	 * @var \Famelo\MelosRtb\Domain\Model\System
	 */
	protected $system = NULL;

	/**
	 * color
	 *
	 * @var \Famelo\MelosRtb\Domain\Model\Color
	 */
	protected $color = NULL;

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
	 * Returns the system
	 *
	 * @return \Famelo\MelosRtb\Domain\Model\System $system
	 */
	public function getSystem() {
		return $this->system;
	}

	/**
	 * Sets the system
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\System $system
	 * @return void
	 */
	public function setSystem(\Famelo\MelosRtb\Domain\Model\System $system) {
		$this->system = $system;
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

}