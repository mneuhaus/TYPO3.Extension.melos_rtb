<?php

namespace Famelo\MelosRtb\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Marc Neuhaus <mneuhaus@famelo.com>, Famelo
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \Famelo\MelosRtb\Domain\Model\ComponentUse.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Marc Neuhaus <mneuhaus@famelo.com>
 */
class ComponentUseTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Famelo\MelosRtb\Domain\Model\ComponentUse
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Famelo\MelosRtb\Domain\Model\ComponentUse();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getSystemReturnsInitialValueForSystem() {
		$this->assertEquals(
			NULL,
			$this->subject->getSystem()
		);
	}

	/**
	 * @test
	 */
	public function setSystemForSystemSetsSystem() {
		$systemFixture = new \Famelo\MelosRtb\Domain\Model\System();
		$this->subject->setSystem($systemFixture);

		$this->assertAttributeEquals(
			$systemFixture,
			'system',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getApplicationReturnsInitialValueForApplication() {
		$this->assertEquals(
			NULL,
			$this->subject->getApplication()
		);
	}

	/**
	 * @test
	 */
	public function setApplicationForApplicationSetsApplication() {
		$applicationFixture = new \Famelo\MelosRtb\Domain\Model\Application();
		$this->subject->setApplication($applicationFixture);

		$this->assertAttributeEquals(
			$applicationFixture,
			'application',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getComponentReturnsInitialValueForComponent() {
		$this->assertEquals(
			NULL,
			$this->subject->getComponent()
		);
	}

	/**
	 * @test
	 */
	public function setComponentForComponentSetsComponent() {
		$componentFixture = new \Famelo\MelosRtb\Domain\Model\Component();
		$this->subject->setComponent($componentFixture);

		$this->assertAttributeEquals(
			$componentFixture,
			'component',
			$this->subject
		);
	}
}
