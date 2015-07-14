<?php
require_once("../applications/money.php");
class Fivethousandyen extends money
{
	function __construct()
	{
		$this->amount = 5000;
	}
}
