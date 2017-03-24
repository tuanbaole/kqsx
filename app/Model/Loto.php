<?php
App::uses('AppModel', 'Model');
/**
 * Loto Model
 *
 * @property Ketqua $Ketqua
 */
class Loto extends AppModel {

	// public $actsAs = array('Containable');

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
