<?php
App::uses('AppModel', 'Model');
/**
 * Bang Model
 *
 * @property Ketqua $Ketqua
 */
class Bang extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ketqua' => array(
			'className' => 'Ketqua',
			'foreignKey' => 'ketqua_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
