<?php
require_once(dirname(__FILE__) . '/config/autoload.php');

class Seller
{
	/**
	 * @var Preserve
	 */
	private $Preserve;

	/**
	 * @var ItemManager
	 */
	private $ItemManager;

	/**
	 * @var Proceeds
	 */
	private $Proceeds;

	/**
	 * 購入できるジュースのリストを返す
	 *
	 * @param int $amount
	 *
	 * @return array
	 */
	public function find_items($amount)
	{
		return array();
	}

	/**
	 * 指定のジュースが購入できるか
	 *
	 * @param string $name
	 * @param int    $amount
	 *
	 * @return bool
	 */
	public function is_buyable($name, $amount)
	{
		return true;
	}

	/**
	 * ジュースを購入する
	 *
	 * @param string $name
	 * @param int    $amount
	 *
	 * @return bool
	 */
	public function buy($name, $amount)
	{
		return true;
	}
}
