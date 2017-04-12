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
class IconHelper extends AppHelper {
    public $helpers = array('Html', 'Session');

    public function trash($model, $id, $url='#' ) {
		return $this->factory('trash', $model, $id, $url);
    }
	
    public function search($model, $id, $url='#' ) {
		return $this->factory('search', $model, $id, $url='#');
    }
	
    public function pencil($model, $id, $url='#' ) {
		return $this->factory('pencil', $model, $id, $url);
    }		
	
	public function factory($icon, $model, $id, $url='#') {
		if( $id!='' && $model!='' ) {
			$output = '<div class="after-input">';
			$output.= sprintf('<a id="%s_%s" class="%s" href="%s"><i class="fa fa-%s"></i></a>', $model, $id, $icon, $url, $icon);
			$output.= '</div>';
			return $output;
		} else {
			return '';
		}
	}
	
    public function isRecording() {
		$ret = false;
		
		$recs = array();
		if ($this->Session->check('recs') != false) {
			$recs = $this->Session->read('recs');
				
			if( isset($recs['Recording']['id']) )
				$ret = true;
		}
		
		return $ret;
    }		
}