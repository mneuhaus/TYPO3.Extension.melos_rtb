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
			if (!is_object($item->getParent())) {
				$item = current($item->getChildren()->toArray());
			}
			$this->view->assign('applications', $item->getApplications());
			$this->view->assign('currentComponent', $item);

			$colors = array(
				'' => array(
					'name' => LocalizationUtility::translate('pleaseSendMeAColorSample', 'MelosRtb')
				)
			);
			foreach($item->getColors() as $color) {
				$colors[] = $color;
			}
			$this->view->assign('colors', $colors);
		}
		$rows = array();
		$row = array();
		$components = array();
		if (isset($this->settings['components']) && !empty($this->settings['components'])) {
			$componentUids = explode(',', $this->settings['components']);
			foreach ($this->componentRepository->findAll() as $component) {
				if (in_array($component->getUid(), $componentUids)) {
					if (count($row) == 2) {
						$rows[] = $row;
						$row = array();
					}
					$row[] = $component;
					$components[] = $component;
				}
			}
			if (count($row) > 0) {
				$rows[] = $row;
			}
		}
		$this->view->assign('rows', $rows);
		$this->view->assign('components', $components);

		$this->view->assign('grain', array(
			'-' => LocalizationUtility::translate('grain', 'MelosRtb'),
			'0,0 - 0,5 mm' => '0,0 - 0,5 mm',
			'0,5 - 1,5 mm ' => '0,5 - 1,5 mm ',
			'1,0 - 3,5 mm ' => '1,0 - 3,5 mm '
		));

		$this->view->assign('clientTitle', array(
			'Herr' => LocalizationUtility::translate('contactTitleMr', 'MelosRtb'),
			'Frau' => LocalizationUtility::translate('contactTitleMs', 'MelosRtb')
		));
	}

	/**
	 * action index
	 *
	 * @param \Famelo\MelosRtb\Domain\Model\Component $component
	 * @param string $clientTitle
	 * @param string $clientName
	 * @param string $clientEmail
	 * @param string $clientCompany
	 * @param string $clientPhone
	 * @param string $clientCountry
	 * @param string $grain
	 * @param boolean $pleaseSendOfferProduct
	 * @param string $clientMessage
	 * @param \Famelo\MelosRtb\Domain\Model\Color $colorSample
	 * @validate $clientName notEmpty;
	 * @validate $clientEmail notEmpty;
	 * @validate $clientEmail emailAddress;
	 * @return void
	 */
	public function contactAction(\Famelo\MelosRtb\Domain\Model\Component $component, $clientTitle, $clientName, $clientEmail, $clientCompany = NULL, $clientPhone = NULL, $clientCountry = NULL, $grain = NULL, $pleaseSendOfferProduct = NULL, $clientMessage = NULL, $colorSample = NULL) {
		$fluidVariables = array(
			'component' => $component,
			'clientTitle' => $clientTitle,
			'clientName' => $clientName,
			'clientCompany' => $clientCompany,
			'clientEmail' => $clientEmail,
			'clientPhone' => $clientPhone,
			'clientCountry' => $clientCountry,
			'grain' => $grain,
			'pleaseSendOfferProduct' => $pleaseSendOfferProduct,
			'clientMessage' => $clientMessage,
			'colorSample' => $colorSample,
		);

		if (!is_dir($this->settings['inquirePdfPath'])) {
			mkdir($this->settings['inquirePdfPath'], 0777, TRUE);
		}

		$pdfPath = $this->settings['inquirePdfPath'] . 'Produktanfrage vom ' . date('Y.m.d H.i.s') . '.pdf';

		$pdf = new \Famelo\MelosRtb\Services\Pdf('melos_rtb:ComponentInquiry');
		$pdf->assignMultiple($fluidVariables);
		$pdf->save($pdfPath);


		$mail = new \Famelo\MelosRtb\Services\Mail();
		$mail->setFrom(array($clientEmail => $clientName));
		$mail->setTo(array($this->settings['mail']['contactRecipientEmail'] => $this->settings['mail']['contactRecipientName']));
		$mail->setSubject('Anfrage von der Melos Homepage [RTB]');
		$mail->setMessage('melos_rtb:ComponentInquiry');
		$mail->assignMultiple($fluidVariables);
  		$mail->attach(\Swift_Attachment::fromPath($pdfPath));
		$mail->send();

		$senderMail = new \Famelo\MelosRtb\Services\Mail();
		$senderMail->setFrom('noreply@melos-gmbh.com');
		$senderMail->setTo(array($clientEmail => $clientName));
		$senderMail->setSubject('Ihre Anfrage an die Melos GmbH wurde erfolgreich übermittelt');
		$senderMail->setMessage('melos_rtb:ComponentInquirySender');
		$senderMail->assignMultiple($fluidVariables);
  		$senderMail->attach(\Swift_Attachment::fromPath($pdfPath));
		$senderMail->send();
	}
}