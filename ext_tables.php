<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}


$tempColumns = array(
	'tx_jfmulticontentviewdemo_feusers' => array(
		'exclude' => 1,
		'displayCond' => 'FIELD:tx_jfmulticontent_view:IN:feuser',
		'label' => 'LLL:EXT:jfmulticontent_viewdemo/locallang_db.xml:tt_content.tx_jfmulticontentviewdemo_feusers',
		'config' => array(
			'type' => 'group',
			'internal_type' => 'db',
			'allowed' => 'fe_users',
			'size' => 12,
			'minitems' => 0,
			'maxitems' => 1000,
		)
	),
);


t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content', $tempColumns, 1);
$subtypes_addlist = t3lib_div::trimExplode(",", $TCA['tt_content']['types']['list']['subtypes_addlist']['jfmulticontent_pi1']);
$first = array(
	array_shift($subtypes_addlist),
	'tx_jfmulticontentviewdemo_feusers',
);
$TCA['tt_content']['types']['list']['subtypes_addlist']['jfmulticontent_pi1'] = implode(",", array_merge($first, $subtypes_addlist));


t3lib_extMgm::addStaticFile($_EXTKEY, 'static/', 'Multi Content View Demo');

?>