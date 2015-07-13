<?php
require_once("../applications/oneyen.php");
class oneyenTest extends PHPUnit_Framework_TestCase
{
	public function test_get_amount()
	{
		$oneyen = new oneyen();
		$this->assertEquals(1, $oneyen->get_amount());
	}
}
