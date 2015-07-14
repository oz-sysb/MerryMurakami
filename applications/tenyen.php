<?php
require_once("../applications/money.php");
class Tenyen extends money
{
	function __construct()
	{
		$this->amount = 10;
	}
}
