<?php
/**
 * Created by PhpStorm.
 * User: y-murakami
 * Date: 2015/07/10
 * Time: 22:59
 */
require_once("../applications/seigyo.php");
require_once("../applications/hyouji.php");
require_once("../applications/config/autoload.php");
class SeigyoTest extends PHPUnit_Framework_TestCase
{
	public function test_total_display()
	{
        $seigyo = new Seigyo();
        $this->assertTrue($seigyo->total_display());
	}
}
