<?php
namespace Famelo\MelosRtb\ViewHelpers;

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
 *
 *
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class MelosMenuViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;

	/**
	 * applicationRepository
	 *
	 * @var \Famelo\MelosRtb\Domain\Repository\ApplicationRepository
	 * @inject
	 */
	protected $applicationRepository;

	/**
	 * componentRepository
	 *
	 * @var \Famelo\MelosRtb\Domain\Repository\ComponentRepository
	 * @inject
	 */
	protected $componentRepository;

	/**
	 * @var \Famelo\MelosRtb\Domain\Repository\SystemRepository
	 * @inject
	 */
	protected $systemRepository;

	/**
	 * @param integer $pid
	 * @param string $as
	 * @param string $types
	 * @return string
	 */
	public function render($pid, $as = 'submenu', $types = NULL) {
		$items = array();
		$settings = $this->getSettings();
		$controller = '';
		switch ($pid) {
			case $settings['applicationPage']:
				$items = $this->applicationRepository->findAll();
				$controller = "Application";

				if (isset($_REQUEST['tx_melosrtb_applications']) && isset($_REQUEST['tx_melosrtb_applications']['item'])) {
					$currentApplicationUid = $_REQUEST['tx_melosrtb_applications']['item'];
					foreach ($items as $item) {
						$item->active = $item->getUid() == $currentApplicationUid;
						if ($item->active) {
							$item->class = 'active';
						}
					}
				}
				break;

			case $settings['componentPage']:
				$componentsToIgnoreInCategoryMenu = explode(',', $settings['componentsToIgnoreInCategoryMenu']);
				if (isset($_REQUEST['tx_melosrtb_components']) && isset($_REQUEST['tx_melosrtb_components']['item'])) {
					$currentComponent = $this->componentRepository->findByUid($_REQUEST['tx_melosrtb_components']['item']);
					$currentRootComponent = $currentComponent->getRootParent();
				}
				foreach ($this->componentRepository->findAll() as $component) {
					if (!is_object($component->getParent()) && !in_array($component->getUid(), $componentsToIgnoreInCategoryMenu)) {
						if (is_object($currentRootComponent)) {
							$component->active = $component->getUid() == $currentRootComponent->getUid();
							if ($component->active) {
								$component->class = 'active';
							}
						}
						$items[] = $component;
					}
				}
				$controller = "Component";
				break;

			case $settings['systemPage']:
				$items = $this->systemRepository->findAll();
				$controller = "System";

				if (isset($_REQUEST['tx_melosrtb_systems']) && isset($_REQUEST['tx_melosrtb_systems']['item'])) {
					$currentSystemUid = $_REQUEST['tx_melosrtb_systems']['item'];
					foreach ($items as $item) {
						$item->active = $item->getUid() == $currentSystemUid;
						if ($item->active) {
							$item->class = 'active';
						}
					}
				}
				break;
		}
		if ($types !== NULL) {
			$types = explode(',', $types);
			if (!in_array($controller, $types)) {
				return;
			}
		}

		$this->templateVariableContainer->add('controller', $controller);
		$this->templateVariableContainer->add($as, $items);
		$output = $this->renderChildren();
		$this->templateVariableContainer->remove($as);
		$this->templateVariableContainer->remove('controller');
		return $output;
	}

	public function getSettings() {
		$typoscriptService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('\TYPO3\CMS\Extbase\Service\TypoScriptService');
		$settings = $typoscriptService->convertTypoScriptArrayToPlainArray($this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT));
		return $settings['plugin']['tx_melosrtb']['settings'];
	}
}


?>