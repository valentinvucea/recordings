<?php
App::uses('AppModel', 'Model');
/**
 * Composer Model
 *
 */
class Composer extends AppModel {

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Nationality' => array(
			'className' => 'Nationality',
			'foreignKey' => 'nationality_id',
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
            'rule' => 'isUnique',
            'required' => true,
            'on' => 'create',
            'message' => 'This name already exists!'
        )
    );  

    public function uniqueField ($x) {
        $count = $this->find('count', array('conditions' => array('name' => $x)));
        // echo $field;
        return $count == 0;
    }
}
