<?php
namespace MerryMurakami\VendingMachine;

require_once(dirname(__FILE__) . '/config/autoload.php');

class Preserve
{
    /**
     * @var int 総額
     */
    private $amount;
    /**
     * @var CoinMech
     */
    private $coinMech;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->amount = 0;
        $this->coinMech = new CoinMech();
    }

    /**
     * 総額に加える
     *
     * @param int $money 投入された金額
     *
     * @return int 加えることができなかったお金
     */
    function add_amount($money)
    {
        $is_usable = $this->coinMech->isUsable($money);
        if ($is_usable === false) {
            return $money;
        }
        $this->amount += $money;

        return $this->amount;
    }

    /**
     * 総額を取り出す
     * 取り出された総額は0に初期化される
     *
     * @return int 総額
     */
    function take_out_amount()
    {
        $amount_all = $this->amount;
        $this->amount = 0;

        return $amount_all;
    }

    /**
     * 総額を教える
     *
     * @return int 総額
     */
    function get_amount()
    {
        return $this->amount;
    }
}
