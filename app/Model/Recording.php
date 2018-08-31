<?php
App::uses('AppModel', 'Model');
/**
 * Recording Model
 *
 * @property Format $Format
 * @property Company $Company
 * @property Recordingnote $Recordingnote
 * @property Ancillarymusic $Ancillarymusic
 * @property Presentation $Presentation
 * @property Recsinger $Recsinger
 * @property Recsong $Recsong
 */
class Recording extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Format' => array(
			'className' => 'Format',
			'foreignKey' => 'format_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Comprecordingnote' => array(
			'className' => 'Comprecordingnote',
			'foreignKey' => 'comprecordingnote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ancillarymusic' => array(
			'className' => 'Ancillarymusic',
			'foreignKey' => 'ancillarymusic_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Presentation' => array(
			'className' => 'Presentation',
			'foreignKey' => 'presentation_id',
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
			'foreignKey' => 'recording_id',
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
		'Recsong' => array(
			'className' => 'Recsong',
			'foreignKey' => 'recording_id',
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

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'no' => array(
            'rule' => 'notEmpty',
            'required' => true
        ),
        'name' => array(
            'rule' => 'notEmpty',
            'required' => true
        ),
        'format_id' => array(
            'rule' => array('notEqual', 0, false),
            'required' => true
        ),
        'company_id' => array(
            'rule' => array('notEqual', 7, false),
            'required' => true
        )
    );
}
