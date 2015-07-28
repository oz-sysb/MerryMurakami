<?php
namespace MerryMurakami\VendingMachine;

class ItemManager
{
    /**
     * @var ItemManager
     */
    private static $instance;

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
     * @return ItemManager
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new ItemManager();
        }

        return self::$instance;
    }

    /**
     * 商品情報を取得
     *
     * @return array 商品情報
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * 該当の商品の在庫を減らす
     *
     * @param string $name 商品名
     *
     * @return array 商品情報
     */
    public function minusItem($name)
    {
        foreach ($this->items as &$item) {
            if ($item['name'] == $name) {
                $item['stock']--;
            }
        }

        return $this->items;
    }
}
