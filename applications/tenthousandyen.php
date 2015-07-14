<?php
require_once("../applications/money.php");
class Tenthousandyen extends money
{
	function __construct()
	{
		$this->amount = 10000;
	}
}
