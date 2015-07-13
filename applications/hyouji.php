<?php
class Hyouji
{
	public $min_diplay;
	public $max_diplay;

	public function __construct()
	{
		$this->min_diplay = 0;
		$this->max_diplay = 9999;
	}

	public function display($display_amount)
	{
		if($this->min_diplay > $display_amount)
		{
			return false;
		}
		if($this->max_diplay < $display_amount)
		{
			return false;
		}
		echo $display_amount;
		return true;
	}
}
