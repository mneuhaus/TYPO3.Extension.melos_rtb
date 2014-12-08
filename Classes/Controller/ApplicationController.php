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
 * ApplicationController
 */
class ApplicationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * applicationRepository
	 *
	 * @var \Famelo\MelosRtb\Domain\Repository\ApplicationRepository
	 * @inject
	 */
	protected $applicationRepository = NULL;

	/**
	 * action index
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Application $item
	 * @return void
	 */
	public function indexAction(\Famelo\MelosRtb\Domain\Model\Application $item = NULL) {
		if ($item === NULL) {
			$item = $this->applicationRepository->findAll()->getFirst();
		}
		$this->view->assign('currentApplication', $item);
		$this->view->assign('applications', $this->applicationRepository->findAll());
	}

}