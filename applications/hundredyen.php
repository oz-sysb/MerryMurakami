<?php
require_once("../applications/money.php");
class Hundredyen extends money
{
	function __construct()
	{
		$this->amount = 100;
	}
}
