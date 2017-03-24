<?php
App::uses('Ketqua', 'Model');

/**
 * Ketqua Test Case
 *
 */
class KetquaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ketqua'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ketqua = ClassRegistry::init('Ketqua');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ketqua);

		parent::tearDown();
	}

}
