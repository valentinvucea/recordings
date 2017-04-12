<?php
App::uses('AppModel', 'Model');
/**
 * Recsong Model
 *
 * @property Recording $Recording
 * @property Song $Song
 */
class Recsong extends AppModel {


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
		'Song' => array(
			'className' => 'Song',
			'foreignKey' => 'song_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public $validate = array(
        'recording_id' => array(
            'unique' => array(
                'rule' => array('checkUnique', array('recording_id', 'song_id'), false), 
                'message' => 'This combination Recording-Composition-Composer already exists!'
            )
        )
    );    

}
