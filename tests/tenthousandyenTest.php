<?php
require_once("../applications/tenthousandyen.php");
class TenthousandyenTest extends PHPUnit_Framework_TestCase
{
	public function test_get_amount()
	{
		$tenthousandyen = new Tenthousandyen();
		$this->assertEquals(10000, $tenthousandyen->get_amount());
	}
}
