<?php
require_once(dirname(__FILE__) . '/../applications/config/autoload.php');
use MerryMurakami\VendingMachine\Proceeds;

class ProceedsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Proceeds
     */
    private $proceeds;

    /**
     * 毎テスト開始時の初期化関数
     *
     * @return void
     */
    public function setUp()
    {
        $this->proceeds = Proceeds::getInstance();
        $this->proceeds->initialize();
    }

    /**
     * @test
     *
     * @return void
     */
    public function 売り上げの初期値が0円か確認する()
    {
        $this->assertEquals(0, $this->proceeds->getAmount());
    }

    /**
     * @test
     *
     * @return void
     */
    public function 売り上げが加算されるか確認する()
    {
        $this->proceeds->addAmount(100);
        $this->assertEquals(100, $this->proceeds->getAmount());
    }

    /**
     * @test
     *
     * @return void
     */
    public function 売り上げが初期化されるか確認する()
    {
        $this->proceeds->addAmount(100);
        $this->proceeds->initialize();
        $this->assertEquals(0, $this->proceeds->getAmount());
    }
}
