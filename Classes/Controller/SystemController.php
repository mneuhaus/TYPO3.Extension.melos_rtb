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

		$this->view->assign('units', array(
			'm²' => 'm²',
			'yards²' => 'yards²',
			'feets²' => 'feets²'
		));

		$this->view->assign('clientTitle', array(
			'Herr' => LocalizationUtility::translate('contactTitleMr', 'MelosRtb'),
			'Frau' => LocalizationUtility::translate('contactTitleMs', 'MelosRtb'),
		));
	}

	/**
	 * action index
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\System $system
	 * @param string $clientTitle
	 * @param string $clientName
	 * @param string $clientEmail
	 * @param string $squareMeasure
 	 * @param string $unit
	 * @param string $clientCompany
	 * @param string $clientPhone
	 * @param string $clientCountry
	 * @param boolean $pleaseSendOfferSystem
	 * @param string $clientMessage
	 * @param boolean $pleaseSendExampleSystem
	 * @validate $clientName notEmpty;
	 * @validate $clientEmail notEmpty;
	 * @validate $clientEmail emailAddress;
	 * @return void
	 */
	public function contactAction(\Famelo\MelosRtb\Domain\Model\System $system, $clientTitle, $clientName, $clientEmail, $squareMeasure = NULL, $unit = NULL, $clientCompany = NULL, $clientPhone = NULL, $clientCountry = NULL, $pleaseSendOfferSystem = NULL, $clientMessage = NULL, $pleaseSendExampleSystem = NULL) {
		$fluidVariables = array(
			'system' => $system,
			'clientTitle' => $clientTitle,
			'clientName' => $clientName,
			'clientCompany' => $clientCompany,
			'clientEmail' => $clientEmail,
			'clientPhone' => $clientPhone,
			'clientCountry' => $clientCountry,
			'squareMeasure' => $squareMeasure,
			'unit' => $unit,
			'pleaseSendOfferSystem' => $pleaseSendOfferSystem,
			'clientMessage' => $clientMessage,
			'pleaseSendExampleSystem' => $pleaseSendExampleSystem,
		);

		if (!is_dir($this->settings['inquirePdfPath'])) {
			mkdir($this->settings['inquirePdfPath'], 0777, TRUE);
		}

		$pdfPath = $this->settings['inquirePdfPath'] . 'Systemanfrage vom ' . date('Y.m.d H.i.s') . '.pdf';

		$pdf = new \Famelo\MelosRtb\Services\Pdf('melos_rtb:SystemInquiry');
		$pdf->assignMultiple($fluidVariables);
		$pdf->save($pdfPath);

		$mail = new \Famelo\MelosRtb\Services\Mail();
		$mail->setFrom(array($clientEmail => $clientName));
		$mail->setTo(array($this->settings['mail']['contactRecipientEmail'] => $this->settings['mail']['contactRecipientName']));
		$mail->setSubject('Anfrage von der Melos Homepage [RTB]');
		$mail->setMessage('melos_rtb:SystemInquiry');
		$mail->assignMultiple($fluidVariables);
  		$mail->attach(\Swift_Attachment::fromPath($pdfPath));
		$mail->send();

		$senderMail = new \Famelo\MelosRtb\Services\Mail();
		$senderMail->setFrom('noreply@melos-gmbh.com');
		$senderMail->setTo(array($clientEmail => $clientName));
		$senderMail->setSubject('Ihre Anfrage an die Melos GmbH wurde erfolgreich übermittelt');
		$senderMail->setMessage('melos_rtb:SystemInquirySender');
		$senderMail->assignMultiple($fluidVariables);
  		$senderMail->attach(\Swift_Attachment::fromPath($pdfPath));
		$senderMail->send();
	}

}