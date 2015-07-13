<?php
require_once("../applications/money.php");
class tenyen extends money
{
	function __construct()
	{
		$this->amount = 10;
	}
}
