<?php
App::uses('Giaithuong', 'Model');

/**
 * Giaithuong Test Case
 *
 */
class GiaithuongTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.giaithuong'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Giaithuong = ClassRegistry::init('Giaithuong');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Giaithuong);

		parent::tearDown();
	}

}
