<?php
App::uses('AppModel', 'Model');
/**
 * Director Model
 *
 * @property Position $Position
 */
class Director extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Position' => array(
			'className' => 'Position',
			'foreignKey' => 'position_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'required' => true
        ),
        'position_id' => array(
            'rule' => array('notEqual', 0, false),
            'required' => true
        )
    );
}
