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
 * Test case for class \Famelo\MelosRtb\Domain\Model\Component.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Marc Neuhaus <mneuhaus@famelo.com>
 */
class ComponentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Famelo\MelosRtb\Domain\Model\Component
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Famelo\MelosRtb\Domain\Model\Component();
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
	public function getThumbnailReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getThumbnail()
		);
	}

	/**
	 * @test
	 */
	public function setThumbnailForFileReferenceSetsThumbnail() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setThumbnail($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'thumbnail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForStringSetsImage() {
		$this->subject->setImage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTeaserReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTeaser()
		);
	}

	/**
	 * @test
	 */
	public function setTeaserForStringSetsTeaser() {
		$this->subject->setTeaser('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'teaser',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() {
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
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

	/**
	 * @test
	 */
	public function getSystemsReturnsInitialValueForSystem() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getSystems()
		);
	}

	/**
	 * @test
	 */
	public function setSystemsForObjectStorageContainingSystemSetsSystems() {
		$system = new \Famelo\MelosRtb\Domain\Model\System();
		$objectStorageHoldingExactlyOneSystems = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneSystems->attach($system);
		$this->subject->setSystems($objectStorageHoldingExactlyOneSystems);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneSystems,
			'systems',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addSystemToObjectStorageHoldingSystems() {
		$system = new \Famelo\MelosRtb\Domain\Model\System();
		$systemsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$systemsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($system));
		$this->inject($this->subject, 'systems', $systemsObjectStorageMock);

		$this->subject->addSystem($system);
	}

	/**
	 * @test
	 */
	public function removeSystemFromObjectStorageHoldingSystems() {
		$system = new \Famelo\MelosRtb\Domain\Model\System();
		$systemsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$systemsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($system));
		$this->inject($this->subject, 'systems', $systemsObjectStorageMock);

		$this->subject->removeSystem($system);

	}
}
