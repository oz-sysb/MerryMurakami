<?php
require_once(dirname(__FILE__) . '/../applications/config/autoload.php');
use MerryMurakami\VendingMachine\VendingMachine;

class VendingMachineTest extends PHPUnit_Framework_TestCase
{
	private $vendingMachine_obj;

	/**
	 * 毎テスト開始時の初期化関数
	 *
	 * @return void
	 */
	public function setUp()
	{
		$this->vendingMachine_obj = new VendingMachine();
	}

	/**
	 * @test
	 *
	 * @param array $invests  投入されるお金
	 * @param int   $expected 受け取れなかった金額
	 *
	 * @return void
	 *
	 * @dataProvider お金受け取る_正常系Provider
	 */
	public function お金受け取る_正常系($invests, $expected)
	{
		$result = $this->vendingMachine_obj->add_amount($invests);
		$this->assertEquals($expected, $result);
	}

	/**
	 * @test
	 *
	 * @param array $invests  投入されるお金
	 * @param int   $expected 受け取れなかった金額
	 *
	 * @return void
	 *
	 * @dataProvider お金受け取る_異常系Provider
	 */
	public function お金受け取る_異常系($invests, $expected)
	{
		$result = $this->vendingMachine_obj->add_amount($invests);
		$this->assertEquals($expected, $result);
	}

	/**
	 * @test
	 *
	 * @param array $invests  投入されるお金
	 * @param int   $expected 投入されている総額
	 *
	 * @return void
	 *
	 * @dataProvider 総額表示_正常系Provider
	 */
	public function 総額表示_正常系($invests, $expected)
	{
		foreach($invests as $money)
		{
			$this->vendingMachine_obj->add_amount($money);
		}
		$result = $this->vendingMachine_obj->get_amount();
		$this->assertEquals($expected, $result);
	}

	/**
	 * @test
	 *
	 * @param array $invests  投入されるお金
	 * @param int   $expected 払い出された総額
	 *
	 * @return void
	 *
	 * @dataProvider 総額表示_正常系Provider
	 */
	public function 払い出す_正常系($invests, $expected)
	{
		foreach($invests as $money)
		{
			$this->vendingMachine_obj->add_amount($money);
		}
		// 投入された分だけの数を払い出すか
		$result = $this->vendingMachine_obj->pay_back();
		$this->assertEquals($expected, $result);
		// 払い出した後は0になっているか
		$zero = $this->vendingMachine_obj->get_amount();
		$this->assertEquals(0, $zero);
	}

	/**
	 * データプロバイダ
	 * 総額に加える
	 *
	 * @return array
	 */
	public function お金受け取る_正常系Provider()
	{
		return [
			[  10, 10],
			[  50, 50],
			[ 100, 100],
			[ 500, 500],
			[1000, 1000],
		];
	}

	/**
	 * データプロバイダ
	 * 総額に加える
	 *
	 * @return array
	 */
	public function お金受け取る_異常系Provider()
	{
		return [
			[     1,     1],
			[     5,     5],
			[  2000,  2000],
			[  5000,  5000],
			[ 10000, 10000],
			[    -1,    -1],
			[  null,  null],
			[  true,  true],
			[ false, false],
		];
	}

	/**
	 * データプロバイダ
	 *
	 * @return array
	 */
	public function 総額表示_正常系Provider()
	{
		return [
			[
				[10],
				10
			],
			[
				[10, 50, 100, 500, 1000],
				1660
			],
		];
	}

}