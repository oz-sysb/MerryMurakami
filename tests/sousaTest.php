<?php
/**
 * Created by PhpStorm.
 * User: y-murakami
 * Date: 2015/07/10
 * Time: 22:59
 */
require_once("../applications/sousa.php");
require_once("../applications/dummy_seigyo.php");

class sousaTest extends PHPUnit_Framework_TestCase
{
	public function test_ok_total_display()
	{
        $sousa = new Sousa();
        $this->assertTrue($sousa->total_display());
	}
}
