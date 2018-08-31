<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	public $actsAs = array('Containable');
	
    /** 
     * checks is the field value is unqiue in the table 
     * note: we are overriding the default cakephp isUnique test as the original appears to be broken 
     * 
     * @param string $data Unused ($this->data is used instead) 
     * @param mnixed $fields field name (or array of field names) to validate 
     * @return boolean true if combination of fields is unique 
     */ 
    public function checkUnique($ignoredData, $fields, $or = true) {
        return $this->isUnique($fields, $or);
    }

    /**
     * Because every related table has an empty value record
     * we validate against the ID of this record
     *
     * @param string check
     * @param $notEqualWith
     *
     * @return bool
     */
    public function notEqual($check, $notEqualWith) {
        return array_values($check)[0] != $notEqualWith;
    }
} 
