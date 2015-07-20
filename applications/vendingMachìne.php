<?php
require_once(dirname(__FILE__) . '/config/autoload.php');

class vendingMachìne
{
	private $preserve_obj;

	/**
	 * コンストラクタ
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->preserve_obj = new Preserve();
	}

	/**
	 * 総額表示
	 *
	 * @return int 投入されている総額
	 */
	function get_amount()
	{
		return $this->preserve_obj->get_amount();
	}

	/**
	 * お金受け取る
	 *
	 * @param  int $money 投入された金額
	 *
	 * @return int 受け取れなかった金額
	 */
	function add_amount($money)
	{
		// preserveクラスの仕様変更の必要あり？
		return $this->preserve_obj->add_amount($money);
	}

	/**
	 * 払い戻す
	 *
	 * @return int 投入された総額
	 */
	function pay_back()
	{
		return $this->preserve_obj->take_out_amount();
	}
}