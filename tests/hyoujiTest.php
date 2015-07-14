<?php
require_once("../applications/hyouji.php");

class hyoujiTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider displayOkProvider
	 */
	public function test_display_ok($amount)
	{
		$hyouji = new Hyouji();
		$this->assertTrue($hyouji->display($amount));
	}

	public function displayOkProvider()
	{
		return array(
			array(0),
			array(10),
			array(100),
			array(500),
			array(1000),
			array(5000),
			array(9999)
		);
	}

	/**
	 * @dataProvider displayNgProvider
	 */
	public function test_display_ng($amount)
	{
		$hyouji = new Hyouji();
		$this->assertFalse($hyouji->display($amount));
	}

	public function displayNgProvider()
	{
		return array(
			array(-1),
			array(10000),
			array(100000),
			array(100000000),
			array(10000000000),
			array(1000000000000),
			array(10000000000000000),
			array(10000000000000000000000)
		);
	}

}
