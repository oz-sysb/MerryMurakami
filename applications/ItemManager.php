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
        $this->initialize();
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
     * 初期化
     */
    public function initialize()
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
    public function getItems()
    {
        return $this->items;
    }

    /**
     * 商品の名前から情報を取得する
     *
     * @param string $name 商品の名前
     *
     * @return array 商品情報（価格と在庫数）
     */
    public function getItemPrice($name)
    {
        $itemInfo = [];
        foreach ($this->items as &$item) {
            if ($item["name"] == $name) {
                $itemInfo = [
                    "price" => $item["price"],
                    "stock" => $item["stock"]
                ];
                break;
            }
        }
        return $itemInfo;
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
