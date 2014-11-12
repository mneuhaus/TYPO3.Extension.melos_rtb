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
 * Test case for class \Famelo\MelosRtb\Domain\Model\Application.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Marc Neuhaus <mneuhaus@famelo.com>
 */
class ApplicationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Famelo\MelosRtb\Domain\Model\Application
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Famelo\MelosRtb\Domain\Model\Application();
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
	public function getThumbnailReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getThumbnail()
		);
	}

	/**
	 * @test
	 */
	public function setThumbnailForStringSetsThumbnail() {
		$this->subject->setThumbnail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
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
	public function getDownloadsReturnsInitialValueForFileReference() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getDownloads()
		);
	}

	/**
	 * @test
	 */
	public function setDownloadsForFileReferenceSetsDownloads() {
		$download = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$objectStorageHoldingExactlyOneDownloads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneDownloads->attach($download);
		$this->subject->setDownloads($objectStorageHoldingExactlyOneDownloads);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneDownloads,
			'downloads',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addDownloadToObjectStorageHoldingDownloads() {
		$download = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$downloadsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$downloadsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($download));
		$this->inject($this->subject, 'downloads', $downloadsObjectStorageMock);

		$this->subject->addDownload($download);
	}

	/**
	 * @test
	 */
	public function removeDownloadFromObjectStorageHoldingDownloads() {
		$download = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$downloadsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$downloadsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($download));
		$this->inject($this->subject, 'downloads', $downloadsObjectStorageMock);

		$this->subject->removeDownload($download);

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
	public function getComponentUsesReturnsInitialValueForComponentUse() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getComponentUses()
		);
	}

	/**
	 * @test
	 */
	public function setComponentUsesForObjectStorageContainingComponentUseSetsComponentUses() {
		$componentUs = new \Famelo\MelosRtb\Domain\Model\ComponentUse();
		$objectStorageHoldingExactlyOneComponentUses = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneComponentUses->attach($componentUs);
		$this->subject->setComponentUses($objectStorageHoldingExactlyOneComponentUses);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneComponentUses,
			'componentUses',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addComponentUsToObjectStorageHoldingComponentUses() {
		$componentUs = new \Famelo\MelosRtb\Domain\Model\ComponentUse();
		$componentUsesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$componentUsesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($componentUs));
		$this->inject($this->subject, 'componentUses', $componentUsesObjectStorageMock);

		$this->subject->addComponentUs($componentUs);
	}

	/**
	 * @test
	 */
	public function removeComponentUsFromObjectStorageHoldingComponentUses() {
		$componentUs = new \Famelo\MelosRtb\Domain\Model\ComponentUse();
		$componentUsesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$componentUsesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($componentUs));
		$this->inject($this->subject, 'componentUses', $componentUsesObjectStorageMock);

		$this->subject->removeComponentUs($componentUs);

	}
}
