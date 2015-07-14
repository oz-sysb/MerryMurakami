<?php
require_once("../applications/config/autoload.php");
class Seigyo
{
    public function total_display()
    {
        return true;
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
