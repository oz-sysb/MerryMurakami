<?php
require_once("../applications/config/autoload.php");
class Seigyo
{
    public function total_display()
    {
        $keisan = new Keisan();
        $total_amount = $keisan->get_total_amount();
        $hyouji = new Hyouji();
        return $hyouji->display($total_amount);
    }

    public function receive(money $money)
    {
        return true;
    }

    public function refund_money()
    {
        return true;
    }
}
