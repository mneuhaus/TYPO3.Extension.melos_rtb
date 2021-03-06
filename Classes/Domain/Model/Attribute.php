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
 * Attribute
 */
class Attribute extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

    /**
     * videoLink
     *
     * @var string
     */
    protected $videoLink = '';

	/**
	 * value
	 *
	 * @var string
	 */
	protected $value = '';

	/**
	 * standard
	 *
	 * @var string
	 */
	protected $standard = '';

	/**
	 * unit
	 *
	 * @var string
	 */
	protected $unit = '';

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
     * Returns the videoLink
     *
     * @return string $videoLink
     */
    public function getVideoLink() {
        return $this->videoLink;
    }

    /**
     * Sets the videoLink
     *
     * @param string $videoLink
     * @return void
     */
    public function setVideoLink($videoLink) {
        $this->name = $videoLink;
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
		$this->name = $standard;
	}

	/**
	 * Returns the unit
	 *
	 * @return string $unit
	 */
	public function getUnit() {
		return $this->unit;
	}

	/**
	 * Sets the standard
	 *
	 * @param string $unit
	 * @return void
	 */
	public function setUnit($unit) {
		$this->name = $unit;
	}


	/**
	 * Returns the value
	 *
	 * @return string $value
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Sets the value
	 *
	 * @param string $value
	 * @return void
	 */
	public function setValue($value) {
		$this->value = $value;
	}

	public function getTranslationKey() {
		// $key = $this->name;
		$parts = explode(' ', $this->name);
		if (substr($parts[1], 0, 1) == '(') {
			$key = $parts[0];
		} else {
			$key = implode(' ', array_slice($parts, 0, 2));
		}
		$key = preg_replace('/(?:^| )(.?)/e', "strtoupper('$1')", $key);
		$key = lcfirst($key);
		return $key;
	}

}