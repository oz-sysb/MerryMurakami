<?php
require_once(dirname(__FILE__) . '/../applications/config/autoload.php');

class VendingMachineTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var vendingMachìne
	 */
	private $vendingMachine;

	/**
	 * 毎テスト開始時の初期化関数
	 *
	 * @return void
	 */
	public function setUp()
	{
		$this->vendingMachine = new vendingMachine();
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
			$this->vendingMachine->add_amount($money);
		}
		$result = $this->vendingMachine->get_amount();
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
			$this->vendingMachine->add_amount($money);
		}
		// 投入された分だけの数を払い出すか
		$result = $this->vendingMachine->pay_back();
		$this->assertEquals($expected, $result);
		// 払い出した後は0になっているか
		$zero = $this->vendingMachine->get_amount();
		$this->assertEquals(0, $zero);
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
