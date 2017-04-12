<?php
App::uses('AppModel', 'Model');
/**
 * Recsinger Model
 *
 * @property Recording $Recording
 * @property Singer $Singer
 */
class Recsinger extends AppModel {


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
			'order' => '',
			'counterCache' => true			
		),
		'Singer' => array(
			'className' => 'Singer',
			'foreignKey' => 'singer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public $validate = array(
        'recording_id' => array(
            'unique' => array(
                'rule' => array('checkUnique', array('recording_id', 'singer_id'), false), 
                'message' => 'This combination Recording-Choir-Director already exists!'
            )
        )
    ); 	
}
