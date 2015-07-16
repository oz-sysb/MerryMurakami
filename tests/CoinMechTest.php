<?php
require_once("../applications/CoinMech.php");

class CoinMechTest extends PHPUnit_Framework_TestCase
{
	private $CoinMech;

	public function setUp()
	{
		$this->CoinMech = new CoinMech();
	}

	/**
	 * @test
	 *
	 * @dataProvider moneyProvider
	 */
	public function 使える硬貨かどうか($amount, $expected)
	{
		$this->assertEquals($expected, $this->CoinMech->is_usable($amount));
	}

	public function moneyProvider()
	{
		return [
			[     1, false],
			[     5, false],
			[    10,  true],
			[    50,  true],
			[   100,  true],
			[   500,  true],
			[  1000,  true],
			[  2000, false],
			[  5000, false],
			[ 10000, false],
			['hoge', false],
			[	  0, false],
			[	 -1, false],
			[  true, false],
			[ false, false],
			[  null, false],
		];
	}
}
