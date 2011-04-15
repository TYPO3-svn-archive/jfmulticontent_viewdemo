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
			'maxitems' => 12,
		)
	),
);


t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content', $tempColumns, 1);
$TCA['tt_content']['types']['list']['subtypes_addlist']['jfmulticontent_pi1'] = str_replace('tx_jfmulticontent_view', 'tx_jfmulticontent_view,tx_jfmulticontentviewdemo_feusers', $TCA['tt_content']['types']['list']['subtypes_addlist']['jfmulticontent_pi1']);


t3lib_extMgm::addStaticFile($_EXTKEY, 'static/', 'Multi Content View Demo');

?>