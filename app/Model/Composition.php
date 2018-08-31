<?php
App::uses('AppModel', 'Model');
/**
 * Composition Model
 *
 * @property Genre $Genre
 * @property Version $Version
 * @property Recordingnote $Recordingnote
 * @property Voicing $Voicing
 */
class Composition extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Genre' => array(
			'className' => 'Genre',
			'foreignKey' => 'genre_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Version' => array(
			'className' => 'Version',
			'foreignKey' => 'version_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Recordingnote' => array(
			'className' => 'Recordingnote',
			'foreignKey' => 'recordingnote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Voicing' => array(
			'className' => 'Voicing',
			'foreignKey' => 'voicing_id',
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
        'title' => array(
            'rule' => 'notEmpty',
            'required' => true
        ),
        'genre_id' => array(
            'rule' => array('notEqual', 1, false),
            'required' => true
        )
    );
}
