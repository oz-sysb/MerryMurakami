<?php
require_once("../applications/config/autoload.php");

class keisanTest extends PHPUnit_Framework_TestCase
{
	public function test_add_amount()
	{
		$keisan = new Keisan();
		$keisan->add_amount(new tenyen());
		$keisan->add_amount(new fiveyen());
		$this->assertEquals(15,$keisan->get_total_amount());
	}

	public function test_get_total_amount()
	{
		$keisan = new Keisan();
		$this->assertTrue($keisan->add_amount(new tenyen()));
		$this->assertEquals(10,$keisan->get_total_amount());
	}

	public function test_clear_total_amount()
	{
		$keisan = new Keisan();
		$keisan->add_amount(new tenyen());
		$this->assertTrue($keisan->clear_total_amount());
		$this->assertEquals(0,$keisan->get_total_amount());
	}

	public function test_add_amount_max()
	{
		$keisan = new Keisan();
		for($i = 0; $i < 999; $i++ )
		{
			$keisan->add_amount(new tenyen());
		}
		$this->assertFalse($keisan->add_amount(new tenyen()));
	}
}
