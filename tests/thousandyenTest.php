<?php
require_once("../applications/thousandyen.php");
class ThousandyenTest extends PHPUnit_Framework_TestCase
{
	public function test_get_amount()
	{
		$thousandyen = new Thousandyen();
		$this->assertEquals(1000, $thousandyen->get_amount());
	}
}
