<?php
class Sousa
{
	public function total_display()
	{
        $seigyo = new Seigyo();
        return $seigyo->total_display();
	}

    public function receive(money $money)
    {
        $seigyo = new Seigyo();
        return $seigyo->receive($money);
    }

    public function refund()
    {
        $seigyo = new Seigyo();
        return $seigyo->refund_money();
    }


}
