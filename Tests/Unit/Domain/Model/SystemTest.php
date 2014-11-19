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
 * Test case for class \Famelo\MelosRtb\Domain\Model\System.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Marc Neuhaus <mneuhaus@famelo.com>
 */
class SystemTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Famelo\MelosRtb\Domain\Model\System
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Famelo\MelosRtb\Domain\Model\System();
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
	public function getImageReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForFileReferenceSetsImage() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'image',
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
	public function getComponentsReturnsInitialValueForComponent() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getComponents()
		);
	}

	/**
	 * @test
	 */
	public function setComponentsForObjectStorageContainingComponentSetsComponents() {
		$component = new \Famelo\MelosRtb\Domain\Model\Component();
		$objectStorageHoldingExactlyOneComponents = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneComponents->attach($component);
		$this->subject->setComponents($objectStorageHoldingExactlyOneComponents);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneComponents,
			'components',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addComponentToObjectStorageHoldingComponents() {
		$component = new \Famelo\MelosRtb\Domain\Model\Component();
		$componentsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$componentsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($component));
		$this->inject($this->subject, 'components', $componentsObjectStorageMock);

		$this->subject->addComponent($component);
	}

	/**
	 * @test
	 */
	public function removeComponentFromObjectStorageHoldingComponents() {
		$component = new \Famelo\MelosRtb\Domain\Model\Component();
		$componentsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$componentsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($component));
		$this->inject($this->subject, 'components', $componentsObjectStorageMock);

		$this->subject->removeComponent($component);

	}

	/**
	 * @test
	 */
	public function getApplicationsReturnsInitialValueForApplication() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getApplications()
		);
	}

	/**
	 * @test
	 */
	public function setApplicationsForObjectStorageContainingApplicationSetsApplications() {
		$application = new \Famelo\MelosRtb\Domain\Model\Application();
		$objectStorageHoldingExactlyOneApplications = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneApplications->attach($application);
		$this->subject->setApplications($objectStorageHoldingExactlyOneApplications);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneApplications,
			'applications',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addApplicationToObjectStorageHoldingApplications() {
		$application = new \Famelo\MelosRtb\Domain\Model\Application();
		$applicationsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$applicationsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($application));
		$this->inject($this->subject, 'applications', $applicationsObjectStorageMock);

		$this->subject->addApplication($application);
	}

	/**
	 * @test
	 */
	public function removeApplicationFromObjectStorageHoldingApplications() {
		$application = new \Famelo\MelosRtb\Domain\Model\Application();
		$applicationsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$applicationsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($application));
		$this->inject($this->subject, 'applications', $applicationsObjectStorageMock);

		$this->subject->removeApplication($application);

	}
}
