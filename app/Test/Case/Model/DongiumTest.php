<?php
App::uses('Dongium', 'Model');

/**
 * Dongium Test Case
 *
 */
class DongiumTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dongium = ClassRegistry::init('Dongium');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dongium);

		parent::tearDown();
	}

}
