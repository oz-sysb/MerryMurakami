<?php
namespace MerryMurakami\VendingMachine;

class ItemManager
{
    /**
     * @var array 商品情報
     */
    private $items;

    public function __construct()
    {
        $this->items = [
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
    }

    /**
     * 商品情報を取得
     *
     * @return array 商品情報
     */
    public function get_items()
    {
        return $this->items;
    }
}