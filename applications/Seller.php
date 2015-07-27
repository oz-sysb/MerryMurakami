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

	public function __construct()
	{
		$this->Preserve = new Preserve();
		$this->ItemManager = new ItemManager();
//		$this->Proceeds = new Proceeds();
	}

	/**
	 * 購入できるジュースのリストを返す
	 *
	 * @param int $amount
	 *
	 * @return array
	 */
	public function find_items($amount)
	{
		$items = $this->ItemManager->get_items();

		$find_items = array();
		foreach($items as $item)
		{
			if($this->is_buyable($item["name"], $amount))
			{
				$find_items[] = $item["name"];
			}
		}

		return $find_items;
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
		$items = $this->ItemManager->get_items();
		foreach($items as $item)
		{
			if($item["name"] == $name)
			{
				$buy_item = $item;
				break;
			}
		}

		// 在庫確認
		if($buy_item["stock"] <= 0)
		{
			return false;
		}

		// その金額で購入できるか
		if($buy_item["price"] > $amount)
		{
			return false;
		}

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
		if( ! $this->is_buyable($name, $amount))
		{
			return false;
		}

		// ジュースを減らす
		$this->ItemManager->minus_item($name);

		// 売上を加算する
		$this->Proceeds->add_proceeds($amount);

		return true;
	}
}
