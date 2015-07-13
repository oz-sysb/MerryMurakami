<?php
require_once("../applications/hanbetu.php");
class hanbetuTest extends PHPUnit_Framework_TestCase
{
	public function test_usable()
	{
		$hanbetu = new hanbetu();
		$this->assertTrue($hanbetu->is_usable(new tenyen()));
	}

	public function test_not_usable()
	{
		$hanbetu = new hanbetu();
		$this->assertFalse($hanbetu->is_usable(new oneyen()));
		$this->assertFalse($hanbetu->is_usable(new fiveyen()));
	}
}
