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
     *
     * @return void
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
    function get_amount()
    {
        return $this->preserve->get_amount();
    }

    /**
     * お金受け取る
     *
     * @param  int $money 投入された金額
     *
     * @return int 受け取れなかった金額
     */
    function add_amount($money)
    {
        return $this->preserve->add_amount($money);
    }

    /**
     * 払い戻す
     *
     * @return int 投入された総額
     */
    function pay_back()
    {
        return $this->preserve->take_out_amount();
    }

    /**
     * ジュース情報取得
     *
     * @return array ジュースの情報を返す
     */
    function get_juice_info()
    {
        return $this->itemManager->get_items();
    }
}
