<?php
require_once("../applications/fiveyen.php");
class fiveyenTest extends PHPUnit_Framework_TestCase
{
	public function test_get_amount()
	{
		$fiveyen = new fiveyen();
		$this->assertEquals(5, $fiveyen->get_amount());
	}
}
