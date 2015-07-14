<?php
/**
 * Created by PhpStorm.
 * User: y-murakami
 * Date: 2015/07/10
 * Time: 22:59
 */
require_once("../applications/sousa.php");
require_once("../applications/dummy_seigyo.php");
require_once("../applications/config/autoload.php");

class sousaTest extends PHPUnit_Framework_TestCase
{
	public function test_total_display()
	{
        $sousa = new Sousa();
        $this->assertTrue($sousa->total_display());
	}

    /**
     *  @dataProvider reeceive_money_Provider
     */
    public function test_receive($money)
    {
        $sousa = new Sousa();
        $this->assertTrue($sousa->receive($money));
    }

    public function reeceive_money_Provider(){
        return array(
            array(new oneyen()),
            array(new fiveyen()),
            array(new tenyen()),
        );
    }

    public function test_refund()
    {
        $sousa = new Sousa();
        $this->assertTrue($sousa->refund());
    }
}
