<?php
App::uses('AppModel', 'Model');
/**
 * Song Model
 *
 * @property Composition $Composition
 * @property Composer $Composer
 * @property Recsong $Recsong
 */
class Song extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Recsong' => array(
			'className' => 'Recsong',
			'foreignKey' => 'song_id',
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

    public $validate = array(
        'composition_id' => array(
            'unique' => array(
                'rule' => array('checkUnique', array('composition_id', 'composer_id'), false), 
                'message' => 'This Composition-Composer pair already exists!'
            )
        )
    );
}
