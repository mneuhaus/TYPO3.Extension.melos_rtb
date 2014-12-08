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
 * Test case for class \Famelo\MelosRtb\Domain\Model\Article.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Marc Neuhaus <mneuhaus@famelo.com>
 */
class ArticleTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Famelo\MelosRtb\Domain\Model\Article
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Famelo\MelosRtb\Domain\Model\Article();
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
	public function getNumberReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getNumber()
		);
	}

	/**
	 * @test
	 */
	public function setNumberForStringSetsNumber() {
		$this->subject->setNumber('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'number',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSpecificationReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getSpecification()
		);
	}

	/**
	 * @test
	 */
	public function setSpecificationForStringSetsSpecification() {
		$this->subject->setSpecification('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'specification',
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
	public function getColorReturnsInitialValueForColor() {
		$this->assertEquals(
			NULL,
			$this->subject->getColor()
		);
	}

	/**
	 * @test
	 */
	public function setColorForColorSetsColor() {
		$colorFixture = new \Famelo\MelosRtb\Domain\Model\Color();
		$this->subject->setColor($colorFixture);

		$this->assertAttributeEquals(
			$colorFixture,
			'color',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAttributesReturnsInitialValueForAttribute() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAttributes()
		);
	}

	/**
	 * @test
	 */
	public function setAttributesForObjectStorageContainingAttributeSetsAttributes() {
		$attribute = new \Famelo\MelosRtb\Domain\Model\Attribute();
		$objectStorageHoldingExactlyOneAttributes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAttributes->attach($attribute);
		$this->subject->setAttributes($objectStorageHoldingExactlyOneAttributes);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAttributes,
			'attributes',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAttributeToObjectStorageHoldingAttributes() {
		$attribute = new \Famelo\MelosRtb\Domain\Model\Attribute();
		$attributesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$attributesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($attribute));
		$this->inject($this->subject, 'attributes', $attributesObjectStorageMock);

		$this->subject->addAttribute($attribute);
	}

	/**
	 * @test
	 */
	public function removeAttributeFromObjectStorageHoldingAttributes() {
		$attribute = new \Famelo\MelosRtb\Domain\Model\Attribute();
		$attributesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$attributesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($attribute));
		$this->inject($this->subject, 'attributes', $attributesObjectStorageMock);

		$this->subject->removeAttribute($attribute);

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

	/**
	 * @test
	 */
	public function getSystemReturnsInitialValueForSystem() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getSystem()
		);
	}

	/**
	 * @test
	 */
	public function setSystemForObjectStorageContainingSystemSetsSystem() {
		$system = new \Famelo\MelosRtb\Domain\Model\System();
		$objectStorageHoldingExactlyOneSystem = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneSystem->attach($system);
		$this->subject->setSystem($objectStorageHoldingExactlyOneSystem);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneSystem,
			'system',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addSystemToObjectStorageHoldingSystem() {
		$system = new \Famelo\MelosRtb\Domain\Model\System();
		$systemObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$systemObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($system));
		$this->inject($this->subject, 'system', $systemObjectStorageMock);

		$this->subject->addSystem($system);
	}

	/**
	 * @test
	 */
	public function removeSystemFromObjectStorageHoldingSystem() {
		$system = new \Famelo\MelosRtb\Domain\Model\System();
		$systemObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$systemObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($system));
		$this->inject($this->subject, 'system', $systemObjectStorageMock);

		$this->subject->removeSystem($system);

	}
}
