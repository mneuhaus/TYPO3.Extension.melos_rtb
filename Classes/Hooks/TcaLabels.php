<?php
namespace Famelo\MelosRtb\Domain\Model;

/**
 * Class TcaLabels
 */
class TcaLabels {
	/**
	 * getDayTitle
	 * @param $params
	 * @param $pObj
	 */
	public function getComponentTitle(&$params, &$pObj) {
		$params['title'] = 'foo';
		// $params['title'] = $params['row']['name'] . ' - ' . $params['row']['subtitle'];
	}
}