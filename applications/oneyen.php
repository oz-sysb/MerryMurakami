<?php
require_once("../applications/money.php");
class oneyen extends money
{
	function __construct()
	{
		$this->amount = 1;
	}
}
