<?php
App::uses('AppModel', 'Model');
/**
 * Singer Model
 *
 * @property Choir $Choir
 * @property Director $Director
 * @property Recsinger $Recsinger
 */
class Singer extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Recsinger' => array(
			'className' => 'Recsinger',
			'foreignKey' => 'singer_id',
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
        'choir_id' => array(
            'unique' => array(
                'rule' => array('checkUnique', array('choir_id', 'director_id'), false), 
                'message' => 'This Choir-Director pair already exists!'
            )
        )
    );
}
