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
		$this->iretoku = new Iretoku();
	}

	/**
	 *
	 */
	public function testIretokuOK()
	{
		$this->assertEquals(TRUE, $this->iretoku_obj->iretoku($okane_obj));
	}

	/**
	 *
	 */
	public function testIretokuNG()
	{
		$this->assertEquals(FALSE, $this->iretoku_obj->iretoku($okane_obj));
	}

	/**
	 *
	 */
	public function testIwaretabundasuOK()
	{
		$result_okane_obj = $this->iwaretabundasu($kingaku);
		$this->assertEquals($ok_okane_obj, $result_okane_obj);
	}

	/**
	 *
	 */
	public function testIwaretabundasuNG()
	{
		$result_okane_obj = $this->iwaretabundasu($kingaku);
		$this->assertEquals($ng_okane_obj, $result_okane_obj);
	}
}
