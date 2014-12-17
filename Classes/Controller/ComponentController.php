<?php
namespace Famelo\MelosRtb\Controller;

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
 * ComponentController
 */
class ComponentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * componentRepository
	 * 
	 * @var \Famelo\MelosRtb\Domain\Repository\ComponentRepository
	 * @inject
	 */
	protected $componentRepository = NULL;

	/**
	 * @var \Famelo\MelosRtb\Domain\Repository\SystemRepository
	 * @inject
	 */
	protected $systemRepository = NULL;

	/**
	 * action index
	 * 
	 * @param \Famelo\MelosRtb\Domain\Model\Component $item
	 * @return void
	 */
	public function indexAction(\Famelo\MelosRtb\Domain\Model\Component $item = NULL) {
		if ($item !== NULL) {
			if ($item->getParent() == NULL) {
				$item = current($item->getChildren()->toArray());
			}
			// $query = $this->systemRepository->createQuery();
			// $query->matching($query->contains('components', $item));
			// $applications = array();
			// $components = array();
			// foreach ($query->execute() as $system) {
			// 	foreach ($system->getApplications() as $application) {
			// 		$applications[$application->getCode()] = $application;
			// 	}
			// }
			// $this->view->assign('applications', $applications);
			$this->view->assign('currentComponent', $item);
		}
		$rows = array();
		$row = array();
		foreach ($this->componentRepository->findAll() as $component) {
			if ($component->getParent() == NULL) {
				if (count($row) == 2) {
					$rows[] = $row;
					$row = array();
				}
				$row[] = $component;
			}
		}
		if (count($row) > 0) {
			$rows[] = $row;
		}
		$this->view->assign('rows', $rows);
	}

}