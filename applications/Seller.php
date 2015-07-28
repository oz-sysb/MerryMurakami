<?php
namespace MerryMurakami\VendingMachine;

require_once(dirname(__FILE__) . '/config/autoload.php');

class Seller
{
    /**
     * @var Preserve
     */
    private $Preserve;

    /**
     * @var ItemManager
     */
    private $ItemManager;

    /**
     * @var Proceeds
     */
    private $Proceeds;

    public function __construct()
    {
        $this->Preserve = new Preserve();
        $this->ItemManager = new ItemManager();
        //		$this->Proceeds = new Proceeds();
    }

    /**
     * 購入できるジュースのリストを返す
     *
     * @param int $amount
     *
     * @return array
     */
    public function findItems($amount)
    {
        $items = $this->ItemManager->getItems();

        $find_items = array();
        foreach ($items as $item) {
            if ($this->isBuyable($item["name"], $amount)) {
                $find_items[] = $item["name"];
            }
        }

        return $find_items;
    }

    /**
     * 指定のジュースが購入できるか
     *
     * @param string $name
     * @param int    $amount
     *
     * @return bool
     */
    public function isBuyable($name, $amount)
    {
        $items = $this->ItemManager->getItems();
        $buy_item = array();
        foreach ($items as $item) {
            if ($item["name"] == $name) {
                $buy_item = $item;
                break;
            }
        }

        // 在庫確認
        if ($buy_item["stock"] <= 0) {
            return false;
        }

        // その金額で購入できるか
        if ($buy_item["price"] > $amount) {
            return false;
        }

        return true;
    }

    /**
     * ジュースを購入する
     *
     * @param string $name
     * @param int    $amount
     *
     * @return bool
     */
    public function buy($name, $amount)
    {
        if (!$this->isBuyable($name, $amount)) {
            return false;
        }

        // ジュースを減らす
        $this->ItemManager->minusItem($name);

        // 売上を加算する
        $this->Proceeds->addProceeds($amount);

        return true;
    }
}
