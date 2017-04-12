<?php
App::uses('AppModel', 'Model');
/**
 * Reccomposer Model
 *
 * @property Record $Record
 * @property Composer $Composer
 */
class Reccomposer extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Record' => array(
			'className' => 'Record',
			'foreignKey' => 'record_id',
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
}
