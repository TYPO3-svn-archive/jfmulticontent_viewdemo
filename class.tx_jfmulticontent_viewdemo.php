<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Juergen Furrer <juergen.furrer@gmail.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

/**
 * HOOK Example for the 'jfmulticontent'.
 *
 * @author     Juergen Furrer <juergen.furrer@gmail.com>
 * @package    TYPO3
 * @subpackage tx_jfmulticontent_viewdemo
 */
class tx_jfmulticontent_viewdemo
{
	/**
	 * Identifier for your view (unique)
	 * @var string
	 */
	private $identifier = "feuser";

	/**
	 * Configuration from parent
	 * @var array
	 */
	private $conf = null;

	/**
	 * cObject from parent
	 * @var object
	 */
	private $cObj = null;

	/**
	 * Titles to use
	 * @var array
	 */
	private $titles = array();

	/**
	 * Contents to use
	 * @var array
	 */
	private $elements = array();

	/**
	 * ID's to use
	 * @var array
	 */
	private $ids = array();

	/**
	 * Main function to render the content, here the titles, elements and ids will be set
	 * @param string $content
	 * @param array $conf
	 * @param object $parent
	 */
	public function main($content, $conf, $parent)
	{
		$this->conf = $conf;
		$this->cObj = $parent->cObj;

		// set the titels from flexform
		$this->titles = t3lib_div::trimExplode(chr(10), $this->cObj->data['pi_flexform']['data']['title']['lDEF']['titles']['vDEF']);
		// set the view
		$view = $this->conf['views.']['feuser.'];
		// get the FE-User ID's
		$ids = t3lib_div::trimExplode(",", $this->cObj->data['tx_jfmulticontentviewdemo_feusers']);
		// get the informations for every content
		for ($a=0; $a < count($ids); $a++) {
			$GLOBALS['TSFE']->register['uid'] = $ids[$a];
			$GLOBALS['TSFE']->register['title'] = $this->titles[$a];
			if ($this->titles[$a] == '' || !isset($this->titles[$a])) {
				$this->titles[$a] = $this->cObj->cObjGetSingle($view['title'], $view['title.']);
				$GLOBALS['TSFE']->register['title'] = $this->titles[$a];
			}
			$this->elements[$a] = $this->cObj->cObjGetSingle($view['content'], $view['content.']);
			$this->ids[$a] = $ids[$a];
		}
		return $content;
	}

	/**
	 * Returns the identifier of this view
	 * @return string
	 */
	public function getIdentifier() {
		return $this->identifier;
	}

	/**
	 * Returns the name of the view (readable)
	 * @return string
	 */
	public function getName() {
		return $GLOBALS['LANG']->sL('LLL:EXT:jfmulticontent_viewdemo/locallang.xml:identifier');
	}

	/**
	 * Returns all titles
	 * @return array
	 */
	public function getTitles() {
		return $this->titles;
	}

	/**
	 * Returns all elements
	 * @return array
	 */
	public function getElements() {
		return $this->elements;
	}

	/**
	 * Returns all ID's
	 * @return array
	 */
	public function getIds() {
		return $this->ids;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jfmulticontent/class.tx_jfmulticontent_viewdemo.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jfmulticontent/class.tx_jfmulticontent_viewdemo.php']);
}

?>