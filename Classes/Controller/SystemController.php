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
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * SystemController
 */
class SystemController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * systemRepository
	 *
	 * @var \Famelo\MelosRtb\Domain\Repository\SystemRepository
	 * @inject
	 */
	protected $systemRepository = NULL;

	/**
	 * colorRepository
	 *
	 * @var \Famelo\MelosRtb\Domain\Repository\ColorRepository
	 * @inject
	 */
	protected $colorRepository = NULL;

	/**
	 * action index
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\System $item
	 * @return void
	 */
	public function indexAction(\Famelo\MelosRtb\Domain\Model\System $item = NULL) {
		if ($item === NULL) {
			$item = $this->systemRepository->findAll()->getFirst();
		}
		$this->view->assign('currentSystem', $item);
		$this->view->assign('systems', $this->systemRepository->findAll());

		$colors = array('' => LocalizationUtility::translate('pleaseSendMeAColorSample', 'MelosRtb'));
		foreach(explode(',',$this->settings['colors']) AS $colorUid) {
			$colors[] = $this->colorRepository->findByUid($colorUid);
		}
		$this->view->assign('colors', $colors);
	}

	/**
	 * action index
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\System $system
	 * @param string $clientName
	 * @param string $clientEmail
	 * @param string $squareMeasure
	 * @param string $unit
	 * @param string $clientCompany
	 * @param string $clientPhone
	 * @param string $clientMessage
	 * @param \Famelo\MelosRtb\Domain\Model\Color $colorSample
	 * @validate $clientName notEmpty;
	 * @validate $clientEmail notEmpty;
	 * @validate $clientEmail emailAddress;
	 * @validate $squareMeasure notEmpty;
	 * @return void
	 */
	public function contactAction(\Famelo\MelosRtb\Domain\Model\System $system, $clientName, $clientEmail, $squareMeasure, $unit, $clientCompany = NULL, $clientPhone = NULL, $clientMessage = NULL, $colorSample) {
		$mail = new \Famelo\MelosRtb\Services\Mail();
		$mail->setFrom(array($clientEmail => $clientName));
		$mail->setTo(array($this->settings['mail']['contactRecipientEmail'] => $this->settings['mail']['contactRecipientName']));
		$mail->setSubject('Anfrage zum System: ' . $system->getName() . ' ' . $system->getSubtitle());
		$mail->setMessage('melos_rtb:SystemInquiry');
		$mail->assign('system', $system);
		$mail->assign('clientName', $clientName);
		$mail->assign('clientCompany', $clientCompany);
		$mail->assign('clientEmail', $clientEmail);
		$mail->assign('clientPhone', $clientPhone);
		$mail->assign('squareMeasure', $squareMeasure);
		$mail->assign('unit', $unit);
		$mail->assign('clientMessage', $clientMessage);
		$mail->assign('colorSample', $colorSample);
		$mail->send();
	}

}