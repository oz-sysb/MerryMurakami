<?php
require_once("../applications/tenyen.php");
class tenyenTest extends PHPUnit_Framework_TestCase
{
	public function test_get_amount()
	{
		$tenyen = new tenyen();
		$this->assertEquals(10, $tenyen->get_amount());
	}
}
