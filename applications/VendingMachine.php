<?php
namespace MerryMurakami\VendingMachine;

require_once(dirname(__FILE__) . '/../applications/config/autoload.php');

class VendingMachine
{
    /**
     * @var Preserve
     */
    private $preserve;

    /**
     * @var ItemManager
     */
    private $itemManager;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->preserve = new Preserve();
        $this->itemManager = new ItemManager();
    }

    /**
     * 総額表示
     *
     * @return int 投入されている総額
     */
    public function getAmount()
    {
        return $this->preserve->getAmount();
    }

    /**
     * お金受け取る
     *
     * @param  int $money 投入された金額
     *
     * @return int 受け取れなかった金額
     */
    public function addAmount($money)
    {
        return $this->preserve->addAmount($money);
    }

    /**
     * 払い戻す
     *
     * @return int 投入された総額
     */
    public function payBack()
    {
        return $this->preserve->takeoutAmount();
    }

    /**
     * ジュース情報取得
     *
     * @return array ジュースの情報を返す
     */
    public function getJuiceInfo()
    {
        return $this->itemManager->get_items();
    }
}
