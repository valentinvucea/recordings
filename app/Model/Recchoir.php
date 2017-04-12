<?php
App::uses('AppModel', 'Model');
/**
 * Recchoir Model
 *
 * @property Record $Record
 * @property Choir $Choir
 */
class Recchoir extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Record' => array(
			'className' => 'Record',
			'foreignKey' => 'record_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Choir' => array(
			'className' => 'Choir',
			'foreignKey' => 'choir_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
