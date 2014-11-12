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
 * ComponentUse
 */
class ComponentUse extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * system
	 *
	 * @var \Famelo\MelosRtb\Domain\Model\System
	 */
	protected $system = NULL;

	/**
	 * application
	 *
	 * @var \Famelo\MelosRtb\Domain\Model\Application
	 */
	protected $application = NULL;

	/**
	 * component
	 *
	 * @var \Famelo\MelosRtb\Domain\Model\Component
	 */
	protected $component = NULL;

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
	 * Returns the application
	 *
	 * @return \Famelo\MelosRtb\Domain\Model\Application $application
	 */
	public function getApplication() {
		return $this->application;
	}

	/**
	 * Sets the application
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Application $application
	 * @return void
	 */
	public function setApplication(\Famelo\MelosRtb\Domain\Model\Application $application) {
		$this->application = $application;
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

}