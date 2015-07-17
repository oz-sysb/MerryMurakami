<?php

/**
 * Created by PhpStorm.
 * User: nokablank
 * Date: 15/07/17
 * Time: 20:36
 */
class ItemManager
{
	/**
	 * @var array 商品情報
	 */
	private $items = [["name"  => "コーラ",
					   "price" => 120,
					   "stock" => 5]];

	public function __construct()
	{
	}

	/**
	 * 商品情報を取得
	 *
	 * @return array 商品情報
	 */
	public function get_items()
	{
		return $this->items;
	}
}