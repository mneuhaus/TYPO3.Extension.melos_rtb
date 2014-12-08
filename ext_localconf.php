<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Famelo.' . $_EXTKEY,
	'Applications',
	array(
		'Application' => 'index',

	),
	// non-cacheable actions
	array(
		'Application' => 'index',

	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Famelo.' . $_EXTKEY,
	'Systems',
	array(
		'System' => 'index',

	),
	// non-cacheable actions
	array(
		'System' => 'index',

	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Famelo.' . $_EXTKEY,
	'Components',
	array(
		'Component' => 'index',

	),
	// non-cacheable actions
	array(
		'Component' => 'index',

	)
);


if (TYPO3_MODE === 'BE') {
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = '\Famelo\MelosRtb\Command\ImportCommandController';
}