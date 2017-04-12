<?php
App::uses('AppModel', 'Model');
/**
 * Comprecordingnote Model
 *
 */
class Comprecordingnote extends AppModel {
	var $displayField = 'note';
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Recording' => array(
			'className' => 'Recording',
			'foreignKey' => 'comprecordingnote_id',
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
