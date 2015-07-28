<?php
require_once(dirname(__FILE__) . '/../applications/config/autoload.php');
use MerryMurakami\VendingMachine\Proceeds;

class ProceedsTest extends PHPUnit_Framework_TestCase
{
    /**
     * 毎テスト開始時の初期化関数
     *
     * @return void
     */
    public function setUp()
    {
    }

    /**
     * @test
     *
     * @return void
     */
    public function 売り上げの初期値が0円か確認する()
    {
        $proceeds = Proceeds::getInstance();
        $this->assertEquals(0, $proceeds->getAmount());
    }

    /**
     * @test
     *
     * @return void
     */
    public function 売り上げが加算されるか確認する()
    {
        $proceeds = Proceeds::getInstance();
        $proceeds->addAmount(100);
        $this->assertEquals(100, $proceeds->getAmount());
    }
}
