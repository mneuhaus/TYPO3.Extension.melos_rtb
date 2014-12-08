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

	/**
	 * @test
	 */
	public function getArticlesReturnsInitialValueForArticle() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getArticles()
		);
	}

	/**
	 * @test
	 */
	public function setArticlesForObjectStorageContainingArticleSetsArticles() {
		$article = new \Famelo\MelosRtb\Domain\Model\Article();
		$objectStorageHoldingExactlyOneArticles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneArticles->attach($article);
		$this->subject->setArticles($objectStorageHoldingExactlyOneArticles);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneArticles,
			'articles',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addArticleToObjectStorageHoldingArticles() {
		$article = new \Famelo\MelosRtb\Domain\Model\Article();
		$articlesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$articlesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($article));
		$this->inject($this->subject, 'articles', $articlesObjectStorageMock);

		$this->subject->addArticle($article);
	}

	/**
	 * @test
	 */
	public function removeArticleFromObjectStorageHoldingArticles() {
		$article = new \Famelo\MelosRtb\Domain\Model\Article();
		$articlesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$articlesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($article));
		$this->inject($this->subject, 'articles', $articlesObjectStorageMock);

		$this->subject->removeArticle($article);

	}

	/**
	 * @test
	 */
	public function getKerningReturnsInitialValueForKerning() {
		$this->assertEquals(
			NULL,
			$this->subject->getKerning()
		);
	}

	/**
	 * @test
	 */
	public function setKerningForKerningSetsKerning() {
		$kerningFixture = new \Famelo\MelosRtb\Domain\Model\Kerning();
		$this->subject->setKerning($kerningFixture);

		$this->assertAttributeEquals(
			$kerningFixture,
			'kerning',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getParentReturnsInitialValueForComponent() {
		$this->assertEquals(
			NULL,
			$this->subject->getParent()
		);
	}

	/**
	 * @test
	 */
	public function setParentForComponentSetsParent() {
		$parentFixture = new \Famelo\MelosRtb\Domain\Model\Component();
		$this->subject->setParent($parentFixture);

		$this->assertAttributeEquals(
			$parentFixture,
			'parent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getChildrenReturnsInitialValueForComponent() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getChildren()
		);
	}

	/**
	 * @test
	 */
	public function setChildrenForObjectStorageContainingComponentSetsChildren() {
		$child = new \Famelo\MelosRtb\Domain\Model\Component();
		$objectStorageHoldingExactlyOneChildren = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneChildren->attach($child);
		$this->subject->setChildren($objectStorageHoldingExactlyOneChildren);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneChildren,
			'children',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addChildToObjectStorageHoldingChildren() {
		$child = new \Famelo\MelosRtb\Domain\Model\Component();
		$childrenObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$childrenObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($child));
		$this->inject($this->subject, 'children', $childrenObjectStorageMock);

		$this->subject->addChild($child);
	}

	/**
	 * @test
	 */
	public function removeChildFromObjectStorageHoldingChildren() {
		$child = new \Famelo\MelosRtb\Domain\Model\Component();
		$childrenObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$childrenObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($child));
		$this->inject($this->subject, 'children', $childrenObjectStorageMock);

		$this->subject->removeChild($child);

	}
}
