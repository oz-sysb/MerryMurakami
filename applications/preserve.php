<?php
class Preserve
{
	// 総額
	private $amount;

	/**
	 * コンストラクタ
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->amount = 0;
	}

	/**
	 * 総額に加える
	 *
	 * @param int $money 投入された金額
	 *
	 * @return int これまでに投入された総金額
	 */
	function add_amount($money)
	{
		$CoinMatch_obj = new CoinMatch();
		if($CoinMatch_obj->is_usable($money) === false)
		{
			return $this->amount;
		}
		$this->amount += $money;
		return $this->amount;
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