<?php
App::uses('AppModel', 'Model');
/**
 * Choir Model
 *
 * @property State $State
 * @property Country $Country
 * @property Denomination $Denomination
 * @property Vocalformat $Vocalformat
 */
class Choir extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'choir';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'State' => array(
			'className' => 'State',
			'foreignKey' => 'state_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Denomination' => array(
			'className' => 'Denomination',
			'foreignKey' => 'denomination_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Vocalformat' => array(
			'className' => 'Vocalformat',
			'foreignKey' => 'vocalformat_id',
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
        'choir' => array(
            'required' => true,
            'on' => 'create',
        ),
        'vocalformat_id' => array(
            'required' => true,
            'on' => 'create',
        )
    );
}
