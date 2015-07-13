<?php
require_once(dirname(__FILE__) . '/../applications/iretoku.php');

class iretokuTest extends PHPUnit_Framework_TestCase
{
	private $iretoku_obj;

	/**
	 * 初期化関数
	 */
	public function setup()
	{
		$this->$iretoku_obj = new Iretoku();
	}

	/**
	 * 入れとく関数 正常系
	 */
	public function testIretokuOK($okane_obj)
	{
		$result = $this->iretoku_obj->iretoku($okane_obj);
		$this->assertEquals(TRUE, $result);
	}

	/**
	 * 入れとく関数 異常系
	 */
	public function testIretokuNG($okane_obj)
	{
		$result = $this->iretoku_obj->iretoku($okane_obj);
		$this->assertEquals(TRUE, $result);
	}

	/**
	 * 言われた分出す 正常系
	 */
	public function testIwaretabundasuOK($kingaku, $ok_okane_obj)
	{
		$result_okane_obj = $this->iwaretabundasu($kingaku);
		$this->assertEquals($ok_okane_obj, $result_okane_obj);
	}

	/**
	 * 言われた分出す 異常系
	 */
	public function testIwaretabundasuNG($kingaku, $ng_okane_obj)
	{
		$result_okane_obj = $this->iwaretabundasu($kingaku);
		$this->assertEquals($ng_okane_obj, $result_okane_obj);
	}
}
