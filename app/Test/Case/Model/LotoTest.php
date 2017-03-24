<?php
App::uses('Loto', 'Model');

/**
 * Loto Test Case
 *
 */
class LotoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.loto',
		'app.ketqua'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Loto = ClassRegistry::init('Loto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Loto);

		parent::tearDown();
	}

}
