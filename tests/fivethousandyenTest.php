<?php
require_once("../applications/fivethousandyen.php");
class FivethousandyenTest extends PHPUnit_Framework_TestCase
{
	public function test_get_amount()
	{
		$fivethousandyen = new  Fivethousandyen();
		$this->assertEquals(5000, $fivethousandyen->get_amount());
	}
}
