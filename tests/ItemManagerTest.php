<?php
namespace MerryMurakami\VendingMachine\Test;

use MerryMurakami\VendingMachine\ItemManager;

require_once(dirname(__FILE__) . '/../applications/config/autoload.php');

class ItemManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ItemManager
     */
    private $itemManager;

    public function setUp()
    {
        $this->itemManager = ItemManager::getInstance();
    }

    /**
     * @test
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

        $expected = $this->itemManager->getItems();
        $this->assertArraySubset($item, $expected);
    }

    /**
     * @test
     */
    public function コーラがマイナスされるか()
    {
        $item = [
            [
                "name"  => "コーラ",
                "price" => 120,
                "stock" => 4
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

        $expected = $this->itemManager->minusItem('コーラ');
        $this->assertArraySubset($item, $expected);
    }

    /**
     * @test
     */
    public function レッドブルがマイナスされるか()
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
                "stock" => 4
            ],
            [
                "name"  => "水",
                "price" => 100,
                "stock" => 5
            ]
        ];

        $expected = $this->itemManager->minusItem('レッドブル');
        $this->assertArraySubset($item, $expected);
    }

    /**
     * @test
     */
    public function 水がマイナスされるか()
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
                "stock" => 4
            ]
        ];

        $expected = $this->itemManager->minusItem('水');
        $this->assertArraySubset($item, $expected);
    }

    /**
     * @test
     *
     * @param string $name     商品名
     * @param array  $expected 商品情報
     *
     * @dataProvider 商品情報Provider
     */
    public function 商品情報を取得する($name, $expected)
    {
        $result = $this->itemManager->getItemInfo($name);
        $this->assertArraySubset($result, $expected);
    }

    /**
     * データプロバイダ
     *
     * @return array
     */
    public function 商品情報Provider()
    {
        return [
            [
                "コーラ",
                [
                    "price" => 120,
                    "stock" => 5
                ]
            ],
            [
                "レッドブル",
                [
                    "price" => 200,
                    "stock" => 5
                ]
            ],
            [
                "水",
                [
                    "price" => 100,
                    "stock" => 5
                ]
            ],
            [
                "IronMan",
                []
            ],
        ];
    }


    public function tearDown()
    {
        $this->itemManager->initialize();
    }
}
