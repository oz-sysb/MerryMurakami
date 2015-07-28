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
        $this->Preserve = Preserve::getInstance();
        $this->ItemManager = ItemManager::getInstance();
        $this->Proceeds = Proceeds::getInstance();
    }

    /**
     * 初期化
     */
    public function initialize()
    {
        $this->Preserve->initialize();
        $this->ItemManager->initialize();
        $this->Proceeds->initialize();
    }

    /**
     * 購入できるジュースのリストを返す
     *
     * @param int $amount 投入されている総額
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
     * @param string $name   商品名
     * @param int    $amount 投入されている総額
     *
     * @return bool
     */
    public function isBuyable($name, $amount)
    {
        $buy_item = $this->ItemManager->getItemInfo($name);

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
     * @param string $name   商品名
     * @param int    $amount 投入されている総額
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
