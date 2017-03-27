<?php
App::uses('Bang', 'Model');

/**
 * Bang Test Case
 *
 */
class BangTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bang',
		'app.ketqua'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bang = ClassRegistry::init('Bang');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bang);

		parent::tearDown();
	}

}
