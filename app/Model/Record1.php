<?php
App::uses('AppModel', 'Model');
/**
 * Record Model
 *
 * @property Recording $Recording
 * @property Composition $Composition
 * @property Composer $Composer
 * @property Choir $Choir
 * @property Director $Director
 */
class Record extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Recording' => array(
			'className' => 'Recording',
			'foreignKey' => 'recording_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Composition' => array(
			'className' => 'Composition',
			'foreignKey' => 'composition_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Composer' => array(
			'className' => 'Composer',
			'foreignKey' => 'composer_id',
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
