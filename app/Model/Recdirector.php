<?php
App::uses('AppModel', 'Model');
/**
 * Recdirector Model
 *
 * @property Record $Record
 * @property Director $Director
 */
class Recdirector extends AppModel {


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
		'Director' => array(
			'className' => 'Director',
			'foreignKey' => 'director_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
