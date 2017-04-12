<?php
App::uses('AppModel', 'Model');
/**
 * Version Model
 *
 * @property Composition $Composition
 */
class Version extends AppModel {
	var $displayField = 'Version';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Composition' => array(
			'className' => 'Composition',
			'foreignKey' => 'version_id',
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

}
