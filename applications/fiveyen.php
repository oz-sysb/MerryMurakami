<?php
require_once("../applications/money.php");
class Fiveyen extends money
{
	function __construct()
	{
		$this->amount = 5;
	}
}
