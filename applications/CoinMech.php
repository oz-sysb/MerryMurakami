<?php
require_once(dirname(__FILE__) . '/config/autoload.php');

class CoinMech
{
    /**
     * @var array 使える硬貨のリスト
     */
    public $usable_money;

    public function __construct()
    {
        $this->usable_money = [10, 50, 100, 500, 1000];
    }

    /**
     * 渡されたお金が自販機で利用可能かを返す
     *
     * @param int $money 金額
     *
     * @return bool 利用可能ならtrue。利用不可ならfalse。
     */
    public function is_usable($money)
    {
        return in_array($money, $this->usable_money, true);
    }

}
