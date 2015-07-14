<?php
class Keisan
{
	public $max_calculable_amount;
	public $total_amount;

	public function __construct()
	{
		$this->max_calculable_amount = 9999;
		$this->total_amount = 0;
	}

	public function add_amount(money $money)
	{
		if( $this->max_calculable_amount < $this->total_amount + $money->get_amount())
		{
			return false;
		}
		$this->total_amount += $money->get_amount();
		return true;
	}

	public function get_total_amount()
	{
		return $this->total_amount;
	}

	public function clear_total_amount()
	{
		$this->total_amount = 0;
		return true;
	}
}
