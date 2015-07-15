<?php
/**
 * Created by PhpStorm.
 * User: y-murakami
 * Date: 2015/07/10
 * Time: 22:59
 */
require_once("../applications/seigyo.php");
require_once("../applications/hyouji.php");
require_once("../applications/keisan.php");
require_once("../applications/hanbetu.php");
require_once("../applications/hakidasu.php");
require_once("../applications/iretoku.php");
require_once("../applications/config/autoload.php");
class SeigyoTest extends PHPUnit_Framework_TestCase
{
	public function test_total_display()
	{
        $seigyo = new Seigyo();
        $this->assertTrue($seigyo->total_display());
	}

    /**
     * @param $money
     * @dataProvider ok_moneyProvider
     */
    public function test_ok_receive($money)
    {
        $seigyo = new Seigyo();
        $this->assertTrue($seigyo->receive($money));
    }
    public function ok_moneyProvider()
    {
        return array(
            array(new tenyen()),
            array(new Fiftyyen()),
            array(new Hundredyen()),
            array(new Fivehundredyen()),
            array(new Thousandyen()),
        );
    }
}
