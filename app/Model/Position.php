<?php
App::uses('AppModel', 'Model');
/**
 * Position Model
 *
 * @property Director $Director
 */
class Position extends AppModel {
	var $displayField = 'Position';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Director' => array(
			'className' => 'Director',
			'foreignKey' => 'position_id',
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
