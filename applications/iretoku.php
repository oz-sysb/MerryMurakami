<?php
/**
 * Created by PhpStorm.
 * User: nagayamashouta
 * Date: 15/07/13
 * Time: 20:29
 */
require_once(dirname(__FILE__) . '/../applications/saiteki.php');

class Iretoku
{
	//枚数の限界？持っているお金の限界？いったん枚数として実装
	private $limit = 100;

	private $money_list;

	public function __construct()
	{
		//newされるたびに金額を忘れてしまうのでファイルに記録する必要が出てきた。
		/*
		if(!file_exists("/tmp/money/iretoku.txt"))
		{
			touch("/tmp/money/iretoku.txt");
		}
		*/
		$this->money_list = array(
			10 => 9,
			50 => 10,
			100 => 10,
			500 => 10,
			1000 => 10
		);
	}

	public function put_in(money $money)
	{
		$tounyuu_kingaku = $money->get_amount();
		if(array_key_exists($tounyuu_kingaku, $this->money_list))
		{
			$this->money_list[$tounyuu_kingaku]++;
		}
		if($this->limit < $this->money_list[$tounyuu_kingaku])
		{
			return FALSE;
		}
		return TRUE;
	}

	public function put_out($amount)
	{
		$saiteki = new Saiteki();
		return $saiteki->saiteki($amount, $this->money_list);
	}
}