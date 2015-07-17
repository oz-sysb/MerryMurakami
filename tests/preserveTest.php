<?php
require_once(dirname(__FILE__) . '/../applications/config/autoload.php');

class PreserveTest extends PHPUnit_Framework_TestCase
{
	private $preserve_obj;

	/**
	 * 毎テスト開始時の初期化関数
	 *
	 * @return void
	 */
	public function setUp()
	{
		$this->preserve_obj = new Preserve();
	}

	/**
	 * @param int $invest   投入金額
	 * @param int $expected 投入されている総額
	 *
	 * @return void
	 *
	 * @dataProvider 総額に加える_正常系Provider
	 */
	public function test総額に加える_正常系($invest, $expected)
	{
		$result = $this->preserve_obj->add_amount($invest);
		$this->assertEquals($expected, $result);
	}

	/**
	 * @param int $invest   投入金額
	 * @param int $expected 投入されている総額
	 *
	 * @return void
	 *
	 * @dataProvider 総額に加える_異常系Provider
	 */
	public function test総額に加える_異常系($invest, $expected)
	{
		$result = $this->preserve_obj->add_amount($invest);
		$this->assertEquals($expected, $result);
	}

	/**
	 * データプロバイダ
	 * 総額に加える
	 *
	 * @return array
	 */
	public function 総額に加える_正常系Provider()
	{
		return [
			[  10,   10],
			[  50,   50],
			[ 100,  100],
			[ 500,  500],
			[1000, 1000],
		];
	}

	/**
	 * データプロバイダ
	 * 総額に加える
	 *
	 * @return array
	 */
	public function 総額に加える_異常系Provider()
	{
		return [
			[     1, 0],
			[     5, 0],
			[  2000, 0],
			[  5000, 0],
			[ 10000, 0],
			[    -1, 0],
			[  null, 0],
			[  true, 0],
			[ false, 0],
		];
	}

	/**
	 * @param array $invests  投入金額の配列
	 * @param int   $expected 取り出された総額
	 *
	 * @return void
	 *
	 * @dataProvider 総額を取り出す_正常系Provider
	 */
	public function test総額を取り出す_正常系($invests, $expected)
	{
		foreach($invests as $invest)
		{
			$this->preserve_obj->add_amount($invest);
		}
		$result = $this->preserve_obj->take_out_amount();
		$this->assertEquals($expected, $result);
	}

	/**
	 * データプロバイダ
	 * 総額を取り出す
	 *
	 * @return array
	 */
	public function 総額を取り出す_正常系Provider()
	{
		return [
			[
				[10],
				10
			],
			[
				[10, 10],
				20
			],
			[
				[100,  50],
				150
			],
			[
				[100, 'IronMan',  50],
				150
			],
		];
	}

	/**
	 * @param array $invests  投入金額の配列
	 * @param int   $expected 取り出された総額
	 *
	 * @return void
	 *
	 * @dataProvider 総額を教える_正常系Provider
	 */
	public function test総額を教える_正常系($invests, $expected)
	{
		for($i = 0; $i < count($invests); $i++)
		{
			$this->preserve_obj->add_amount($invests[$i]);
			$result = $this->preserve_obj->get_amount();
			$this->assertEquals($expected[$i], $result);
		}
	}

	/**
	 * データプロバイダ
	 * 総額に教える
	 *
	 * @return array
	 */
	public function 総額を教える_正常系Provider()
	{
		return [
			[
				[10],
				[10]
			],
			[
				[10, 10],
				[10, 20]
			],
			[
				[100,  50],
				[100, 150]
			],
			[
				[100, 'IronMan',  50],
				[100,       100, 150]
			],
		];
	}
}