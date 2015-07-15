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
        $hanbetu = new hanbetu();
        $hakidasu = new Hakidasu();
        if(false === $hanbetu->is_usable($money))
        {
            $hakidasu->refund($money);
            return false;
        }
        $iretoku = new Iretoku();
        if(false === $iretoku->put_in($money))
        {
            $hakidasu->refund($money);
            return false;
        }
        $keisan = new Keisan();
        if(false === $keisan->add_amount($money))
        {
            $out_money = $iretoku->put_out($money);
            $hakidasu->refund($out_money);
            return false;
        }

        return true;
    }

    public function refund_money()
    {
        return true;
    }
}
