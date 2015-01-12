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
		// $nextSorting = 256 * 2;
		// foreach ($this->componentRepository->findAll() as $component) {
		// 	if ($component->getParent() == NULL) {
		// 		$component->setSorting($nextSorting);
		// 		foreach ($component->getChildren() as $firstLevelChild) {
		// 			$nextSorting = $nextSorting + 256;
		// 			$firstLevelChild->setSorting($nextSorting);
		// 			$this->componentRepository->update($firstLevelChild);
		// 			foreach ($firstLevelChild->getChildren() as $secondLevelChild) {
		// 				$nextSorting = $nextSorting + 256;
		// 				$secondLevelChild->setSorting($nextSorting);
		// 				$this->componentRepository->update($secondLevelChild);
		// 			}
		// 		}
		// 	}
		// 	$this->componentRepository->update($component);
		// }
		if ($item !== NULL) {
			if ($item->getParent() == NULL) {
				$item = current($item->getChildren()->toArray());
			}
			$this->view->assign('applications', $item->getApplications());
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

	/**
	 * action index
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Component $component
	 * @param string $clientName
	 * @param string $clientEmail
	 * @param string $squareMeasure
	 * @param string $clientCompany
	 * @param string $clientPhone
	 * @param string $clientMessage
	 * @validate $clientName notEmpty;
	 * @validate $clientEmail notEmpty;
	 * @validate $clientEmail emailAddress;
	 * @validate $squareMeasure notEmpty;
	 * @return void
	 */
	public function contactAction(\Famelo\MelosRtb\Domain\Model\Component $component, $clientName, $clientEmail, $squareMeasure, $clientCompany = NULL, $clientPhone = NULL, $clientMessage = NULL) {
		$mail = new \Famelo\MelosRtb\Services\Mail();
		$mail->setFrom(array($clientEmail => $clientName));
		$mail->setTo(array($this->settings['mail']['contactRecipientEmail'] => $this->settings['mail']['contactRecipientName']));
		$mail->setSubject('Anfrage zur Komponente: ' . $component->getName() . ' ' . $component->getSubtitle());
		$mail->setMessage('melos_rtb:ComponentInquiry');
		$mail->assign('component', $component);
		$mail->assign('clientName', $clientName);
		$mail->assign('clientCompany', $clientCompany);
		$mail->assign('clientEmail', $clientEmail);
		$mail->assign('clientPhone', $clientPhone);
		$mail->assign('squareMeasure', $squareMeasure);
		$mail->assign('clientMessage', $clientMessage);
		$mail->send();
	}

}