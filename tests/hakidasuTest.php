<?php
/**
 * Created by PhpStorm.
 * User: y-murakami
 * Date: 2015/07/10
 * Time: 22:59
 */
require_once("../applications/hakidasu.php");
require_once("../applications/config/autoload.php");
class hakidasuTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider moneyProvider
	 */
	public function test_refund_ok($money)
	{
		$hakidasu = new Hakidasu();
		$this->assertTrue($hakidasu->refund($money));
	}

	public function moneyProvider()
	{
		return array(
			array(new oneyen()),
			array(new fiveyen()),
			array(new fiveyen())
		);
	}
}
