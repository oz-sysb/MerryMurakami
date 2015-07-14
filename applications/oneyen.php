<?php
require_once("../applications/money.php");
class Oneyen extends money
{
	function __construct()
	{
		$this->amount = 1;
	}
}
