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

	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Famelo.' . $_EXTKEY,
	'Systems',
	array(
		'System' => 'index, contact',

	),
	// non-cacheable actions
	array(
		'System' => 'contact',

	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Famelo.' . $_EXTKEY,
	'Components',
	array(
		'Component' => 'index, contact',

	),
	// non-cacheable actions
	array(
		'Component' => 'contact',

	)
);
