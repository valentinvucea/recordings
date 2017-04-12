<?php
App::uses('AppModel', 'Model');
/**
 * Recordingnote Model
 *
 * @property Composition $Composition
 */
class Recordingnote extends AppModel {
	var $displayField = 'recording_note';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Composition' => array(
			'className' => 'Composition',
			'foreignKey' => 'recordingnote_id',
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
