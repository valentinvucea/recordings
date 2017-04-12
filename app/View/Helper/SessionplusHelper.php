<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppHelper', 'View/Helper');
/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class SessionplusHelper extends AppHelper {
    public $helpers = array('Html', 'Session');
	
    public function getSession($sess) {
		$recs = array();
		if ($this->Session->check($sess) != false)
			$recs = $this->Session->read($sess);
		
		return $recs;
	}
	
	public function isSession($sess) {
		$ret = false;
		if ($this->Session->check($sess) != false)
			$ret = true;
		
		return $ret;
    }

	public function isLinked($key, $val, $sess) {
		$ret = false;
		$recs = $this->getSession($sess);
		
		if( isset($recs[$key]) && $recs[$key] == $val )
			$ret = true;
		
		return $ret;
	}

	public function isLinkedArr($arr, $key, $val, $sess) {
		$ret = false;
		$recs = $this->getSession($sess);

		if( isset($recs[$arr]) && is_array($recs[$arr]) ) {
			foreach($recs[$arr] as $i=>$elem) {
				if( isset($elem[$key]) && $elem[$key] == $val ) {
					$ret = true;
					break;
				}
			}
		}

		return $ret;
	}
}