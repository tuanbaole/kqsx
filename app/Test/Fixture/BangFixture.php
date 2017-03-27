<?php
/**
 * BangFixture
 *
 */
class BangFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 255, 'unsigned' => true, 'key' => 'primary'),
		'ketqua_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => true, 'key' => 'index'),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'so_bang' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 50, 'unsigned' => true),
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
			'date' => '2017-03-27',
			'so_bang' => 1,
			'created' => '2017-03-27 05:40:35',
			'modified' => '2017-03-27 05:40:35'
		),
	);

}
