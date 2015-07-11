<?php
require_once ('./applications/hoge.php');
/**
 * Created by PhpStorm.
 * User: y-murakami
 * Date: 2015/07/10
 * Time: 22:59
 */
class hogeTest extends PHPUnit_Framework_TestCase
{
	public function testFuga()
	{
		$hoge = new hoge();
		$this->asserttrue($hoge->hoge_func());
	}
}
