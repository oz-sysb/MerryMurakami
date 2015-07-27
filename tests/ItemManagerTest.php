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
        $this->itemManager = new ItemManager();
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
}
