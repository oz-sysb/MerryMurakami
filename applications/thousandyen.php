<?php
require_once("../applications/money.php");
class Thousandyen extends money
{
	function __construct()
	{
		$this->amount = 1000;
	}
}
