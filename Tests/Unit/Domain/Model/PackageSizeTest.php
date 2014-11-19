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
 * Test case for class \Famelo\MelosRtb\Domain\Model\PackageSize.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Marc Neuhaus <mneuhaus@famelo.com>
 */
class PackageSizeTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Famelo\MelosRtb\Domain\Model\PackageSize
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Famelo\MelosRtb\Domain\Model\PackageSize();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCodeReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getCode()
		);
	}

	/**
	 * @test
	 */
	public function setCodeForStringSetsCode() {
		$this->subject->setCode('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'code',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSortingReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getSorting()
		);
	}

	/**
	 * @test
	 */
	public function setSortingForStringSetsSorting() {
		$this->subject->setSorting('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'sorting',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getL10nParentReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getL10nParent()
		);
	}

	/**
	 * @test
	 */
	public function setL10nParentForIntegerSetsL10nParent() {
		$this->subject->setL10nParent(12);

		$this->assertAttributeEquals(
			12,
			'l10nParent',
			$this->subject
		);
	}
}
