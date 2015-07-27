<?php
require_once(dirname(__FILE__) . '/../applications/config/autoload.php');
use MerryMurakami\VendingMachine\CoinMech;

class coinMechTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var CoinMech
     */
    private $coinMech;

    public function setUp()
    {
        $this->coinMech = new CoinMech();
    }

    /**
     * @test
     *
     * @param $amount
     * @param $expected
     *
     * @dataProvider moneyProvider
     */
    public function 使える硬貨かどうか($amount, $expected)
    {
        $this->assertEquals($expected, $this->coinMech->is_usable($amount));
    }

    /**
     * @test
     *
     * @param $amount
     * @param $expected
     *
     * @dataProvider illegalProvider
     */
    public function 数値以外はfalseになるか($amount, $expected)
    {
        $this->assertEquals($expected, $this->coinMech->is_usable($amount));
    }

    public function moneyProvider()
    {
        return [
            [1, false],
            [5, false],
            [10, true],
            [50, true],
            [100, true],
            [500, true],
            [1000, true],
            [2000, false],
            [5000, false],
            [10000, false]
        ];
    }

    public function illegalProvider()
    {
        return [
            ['hoge', false],
            [0, false],
            [-1, false],
            [true, false],
            [false, false],
            [null, false]
        ];
    }
}
