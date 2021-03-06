<?php
namespace MerryMurakami\VendingMachine\Test;

use MerryMurakami\VendingMachine\Seller;

require_once(dirname(__FILE__) . '/../applications/config/autoload.php');

class SellerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Seller
     */
    private $Seller;

    public function setUp()
    {
        $this->Seller = new Seller();
    }

    /**
     * @test
     */
    public function 在庫があるか()
    {
        $expected = $this->Seller->isBuyable("水", 100);
        $this->assertTrue($expected);
    }

    /**
     * @test
     */
    public function 百円で買えるか()
    {
        $expected = $this->Seller->isBuyable("水", 100);
        $this->assertTrue($expected);
    }

    /**
     * @test
     */
    public function 百円で購入可能なジュースのリストが取得できるか()
    {
        $item_list = ["水"];

        $expected = $this->Seller->findItems(100);

        $this->assertArraySubset($item_list, $expected);
    }

    public function tearDown()
    {
        $this->Seller->initialize();
    }
}