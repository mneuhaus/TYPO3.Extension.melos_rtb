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
 * Test case for class \Famelo\MelosRtb\Domain\Model\Kerning.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Marc Neuhaus <mneuhaus@famelo.com>
 */
class KerningTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Famelo\MelosRtb\Domain\Model\Kerning
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Famelo\MelosRtb\Domain\Model\Kerning();
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
}
