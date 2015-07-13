<?php
require_once("../applications/fivehundredyen.php");
class FivehundredyenTest extends PHPUnit_Framework_TestCase
{
	public function test_get_amount()
	{
		$fivehundredyen = new Fivehundredyen();
		$this->assertEquals(500, $fivehundredyen->get_amount());
	}
}
