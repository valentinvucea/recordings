<?php
App::uses('AppModel', 'Model');
/**
 * Record Model
 *
 * @property Recording $Recording
 * @property Composition $Composition
 * @property Recchoir $Recchoir
 * @property Reccomposer $Reccomposer
 * @property Recdirector $Recdirector
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Recchoir' => array(
			'className' => 'Recchoir',
			'foreignKey' => 'record_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Reccomposer' => array(
			'className' => 'Reccomposer',
			'foreignKey' => 'record_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Recdirector' => array(
			'className' => 'Recdirector',
			'foreignKey' => 'record_id',
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
