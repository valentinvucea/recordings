<?php
App::uses('AppModel', 'Model');
/**
 * Nationality Model
 *
 */
class Nationality extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nationality';
    
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Director' => array(
			'className' => 'Composer',
			'foreignKey' => 'nationality_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);    

}
