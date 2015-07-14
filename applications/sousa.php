<?php
class Sousa
{
	public function total_display()
	{
        $seigyo = new Dummy_seigyo();
        return $seigyo->dummy_total_display();
	}

    public function receive(money $money)
    {
        $seigyo = new Dummy_seigyo();
        return $seigyo->dummy_receive_money($money);
    }

    public function refund()
    {
        $seigyo = new Dummy_seigyo();
        return $seigyo->dummy_refund_money();
    }


}
