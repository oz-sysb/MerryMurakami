<?php
require_once(dirname(__FILE__) . '/config/autoload.php');

class hanbetu
{
	public $usable_money;

	function __construct()
	{
		$this->usable_money = array(10,50,100,500,1000);
	}

	/**
	 * 渡されたお金が自販機で利用可能かを返す
	 * @param money $money
	 * @return bool 利用可能ならtrue。利用不可ならfalse。
	 */
	public function is_usable(money $money)
	{
		return in_array($money->get_amount(), $this->usable_money);
	}

}
