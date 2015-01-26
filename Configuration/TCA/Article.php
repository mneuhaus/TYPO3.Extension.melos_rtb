<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_melosrtb_domain_model_article'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_melosrtb_domain_model_article']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden,
				name,
				number,
				specification,
				l10n_parent,
				image,
				image_mobile,
				detail,
				kerning,
				color,
				component,
				system',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1,
			name,
			number,
			specification,
			l10n_parent,
			image,
			image_mobile,
			detail,
			kerning,
			color,
			component,
			system, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(

		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_melosrtb_domain_model_article',
				'foreign_table_where' => 'AND tx_melosrtb_domain_model_article.pid=###CURRENT_PID### AND tx_melosrtb_domain_model_article.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),

		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_article.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_article.number',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'specification' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_article.specification',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'l10n_parent' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_article.l10n_parent',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_article.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'image_mobile' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_article.image_mobile',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'imageMobile',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'detail' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_article.detail',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'detail',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'kerning' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_article.kerning',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_melosrtb_domain_model_kerning',
				'foreign_table_where' => ' AND sys_language_uid = 0',
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					array('', 0)
				)
			),
		),
		'color' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_article.color',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_melosrtb_domain_model_color',
				'foreign_table_where' => ' AND sys_language_uid = 0',
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					array('', 0)
				)
			),
		),
		'component' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_article.component',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_melosrtb_domain_model_component',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'system' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_article.system',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_melosrtb_domain_model_system',
				'MM' => 'tx_melosrtb_system_article_mm',
				'MM_opposite_field' => 'articles',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_melosrtb_domain_model_system',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'code' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:melos_rtb/Resources/Private/Language/locallang_db.xlf:tx_melosrtb_domain_model_color.code',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	),
);
