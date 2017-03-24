<?php
/**
 * GiaithuongFixture
 *
 */
class GiaithuongFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'loto' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'diem' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => true),
		'diem_trung' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'tien_danh' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 255, 'unsigned' => false),
		'tien_trung' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'trang_thai' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 2, 'unsigned' => true, 'comment' => '1 la lo,0 la de'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'loto' => 1,
			'diem' => 1,
			'diem_trung' => 1,
			'date' => '2017-03-24',
			'tien_danh' => 1,
			'tien_trung' => 1,
			'trang_thai' => 1,
			'created' => '2017-03-24 07:48:43',
			'modified' => '2017-03-24 07:48:43'
		),
	);

}
