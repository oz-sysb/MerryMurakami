<?php
require_once(dirname(__FILE__) . '/../applications/config/autoload.php');
class iretokuTest extends PHPUnit_Framework_TestCase
{
	private $iretoku_obj;

	/**
	 * 初期化関数
	 *
	 * @return void
	 */
	public function setup()
	{
		$this->iretoku_obj = new Iretoku();
	}

	/**
	 * 入れとく関数 正常系
	 *
	 * @return void
	 */
	public function testIretokuOK()
	{
		$this->assertTrue($this->iretoku_obj->put_in(new Tenyen()));
	}

	/**
	 * 入れとく関数 異常系
	 *
	 * @return void
	 */
	public function testIretokuNG()
	{
		for ($i = 0; $i < 99; $i++) {
			$this->iretoku_obj->put_in(new Tenyen());
		}
		$this->assertFalse($this->iretoku_obj->put_in(new Tenyen()));
	}
}
