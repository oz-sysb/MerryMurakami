<?php
require_once("../applications/money.php");

class Hakidasu
{
	public function refund(money $money)
	{
		echo $money->get_amount();
		return true;
	}
}
