<?php
require_once("../applications/hundredyen.php");
class HudredyenTest extends PHPUnit_Framework_TestCase
{
	public function test_get_amount()
	{
		$hudredyen = new Hundredyen();
		$this->assertEquals(100, $hudredyen->get_amount());
	}
}
