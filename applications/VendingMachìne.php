<?php
require_once(dirname(__FILE__) . '/config/autoload.php');

class VendingMachìne
{
	private $preserve_obj;
	private $itemManager_obj;

	/**
	 * コンストラクタ
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->preserve_obj    = new Preserve();
		$this->itemManager_obj = new ItemManager();
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

	/**
	 * ジュース情報取得
	 *
	 * @return array ジュースの情報を返す
	 */
	function get_juice_info()
	{
		return $this->itemManager_obj->get_items();
	}
}
