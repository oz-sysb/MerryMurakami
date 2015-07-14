<?php
require_once("../applications/config/autoload.php");
class Dummy_seigyo
{

    public function dummy_total_display()
    {
        return true;
    }

    public function dummy_receive_money(money $money)
    {
        return true;
    }

    public function dummy_refund_money()
    {
        return true;
    }
}
