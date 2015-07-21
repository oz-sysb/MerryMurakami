<?php
require_once(dirname(__FILE__) . '/config/autoload.php');

class Preserve
{
	// 総額
	private $amount;
	private $CoinMech_obj;

	/**
	 * コンストラクタ
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->amount = 0;
		$this->CoinMech_obj = new CoinMech();
	}

	/**
	 * 総額に加える
	 * 引数はint型
	 *
	 * @param int $money 投入された金額
	 *
	 * @return int 投入された金額が総額に加えられたか
	 */
	function add_amount($money)
	{
		$this->amount += $money;
		return 0;
	}

	/**
	 * 総額を取り出す
	 * 取り出された総額は0に初期化される
	 *
	 * @return int 総額
	 */
	function take_out_amount()
	{
		$amout_all = $this->amount;
		$this->amount = 0;
		return $amout_all;
	}

	/**
	 * 総額を教える
	 *
	 * @return int 総額
	 */
	function get_amount()
	{
		return $this->amount;
	}
}