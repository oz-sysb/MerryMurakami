<?php
namespace MerryMurakami\VendingMachine\Test;

use MerryMurakami\VendingMachine\VendingMachine;

require_once(dirname(__FILE__) . '/../applications/config/autoload.php');

class VendingMachineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var VendingMachine
     */
    private $vendingMachine;

    /**
     * 毎テスト開始時の初期化関数
     *
     * @return void
     */
    public function setUp()
    {
        $this->vendingMachine = new VendingMachine();
    }

    /**
     * @test
     *
     * @param int   $invest   投入されるお金
     * @param int   $expected 受け取れなかった金額
     *
     * @return void
     *
     * @dataProvider お金受け取る_正常系Provider
     */
    public function お金受け取る_正常系($invest, $expected)
    {
        $result = $this->vendingMachine->addAmount($invest);
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     *
     * @param int   $invest   投入されるお金
     * @param int   $expected 受け取れなかった金額
     *
     * @return void
     *
     * @dataProvider お金受け取る_異常系Provider
     */
    public function お金受け取る_異常系($invest, $expected)
    {
        $result = $this->vendingMachine->addAmount($invest);
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     *
     * @param array $invests  投入されるお金
     * @param int   $expected 投入されている総額
     *
     * @return void
     *
     * @dataProvider 総額表示_正常系Provider
     */
    public function 総額表示_正常系($invests, $expected)
    {
        foreach ($invests as $money)
        {
            $this->vendingMachine->addAmount($money);
        }
        $result = $this->vendingMachine->getAmount();
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     *
     * @param array $invests  投入されるお金
     * @param int   $expected 払い出された総額
     *
     * @return void
     *
     * @dataProvider 総額表示_正常系Provider
     */
    public function 払い出す_正常系($invests, $expected)
    {
        foreach ($invests as $money)
        {
            $this->vendingMachine->addAmount($money);
        }
        // 投入された分だけの数を払い出すか
        $result = $this->vendingMachine->payBack();
        $this->assertEquals($expected, $result);
        // 払い出した後は0になっているか
        $zero = $this->vendingMachine->getAmount();
        $this->assertEquals(0, $zero);
    }

    /**
     * @test
     *
     * @return void
     */
    public function コーラとレッドブルと水があるか()
    {
        $item = [
            [
                "name"  => "コーラ",
                "price" => 120,
                "stock" => 5
            ],
            [
                "name"  => "レッドブル",
                "price" => 200,
                "stock" => 5
            ],
            [
                "name"  => "水",
                "price" => 100,
                "stock" => 5
            ]
        ];

        $expected = $this->vendingMachine->getJuiceInfo();
        $this->assertArraySubset($item, $expected);
    }

    /**
     * データプロバイダ
     * 総額に加える
     *
     * @return array
     */
    public function お金受け取る_正常系Provider()
    {
        return [
            [10, 10],
            [50, 50],
            [100, 100],
            [500, 500],
            [1000, 1000],
        ];
    }

    /**
     * データプロバイダ
     * 総額に加える
     *
     * @return array
     */
    public function お金受け取る_異常系Provider()
    {
        return [
            [1, 1],
            [5, 5],
            [2000, 2000],
            [5000, 5000],
            [10000, 10000],
            [-1, -1],
            [null, null],
            [true, true],
            [false, false],
        ];
    }

    /**
     * データプロバイダ
     *
     * @return array
     */
    public function 総額表示_正常系Provider()
    {
        return [
            [
                [10],
                10
            ],
            [
                [10, 50, 100, 500, 1000],
                1660
            ],
        ];
    }

    public function tearDown()
    {
        $this->vendingMachine->initialize();
    }
}
