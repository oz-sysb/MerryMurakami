<?php
require_once("../applications/fiftyyen.php");
class FiftyyenTest extends PHPUnit_Framework_TestCase
{
	public function test_get_amount()
	{
		$fiftyyen = new fiftyyen();
		$this->assertEquals(50, $fiftyyen->get_amount());
	}
}
