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
		'Recordingnote' => array(
			'className' => 'Recordingnote',
			'foreignKey' => 'recordingnote_id',
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
}
