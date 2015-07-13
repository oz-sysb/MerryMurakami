<?php
require_once("../applications/money.php");
class fiveyen extends money
{
	function __construct()
	{
		$this->amount = 5;
	}
}
