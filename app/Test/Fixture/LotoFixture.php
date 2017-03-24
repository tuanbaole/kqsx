<?php
/**
 * LotoFixture
 *
 */
class LotoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 255, 'unsigned' => true, 'key' => 'primary'),
		'ketqua_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => true, 'key' => 'index'),
		'loto' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'dau' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'dit' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'dacbiet' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'date' => array('type' => 'date', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'ketqua_id' => array('column' => 'ketqua_id', 'unique' => 0),
			'ketqua_id_2' => array('column' => 'ketqua_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'ketqua_id' => 1,
			'loto' => 1,
			'dau' => 1,
			'dit' => 1,
			'dacbiet' => 1,
			'date' => '2017-03-21',
			'created' => '2017-03-21 10:29:59',
			'modified' => '2017-03-21 10:29:59'
		),
	);

}
