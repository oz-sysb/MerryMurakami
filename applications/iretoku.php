<?php
/**
 * Created by PhpStorm.
 * User: nagayamashouta
 * Date: 15/07/13
 * Time: 20:29
 */

/**
 * お金いれとくboxの仕様
 * /iretoku_box
 * ┗/tenyen
 * 　┗ハッシュ値.dat…ファイルの中にお金のプロパティを保存しとく
 * 　┗ハッシュ値.dat
 * 　┗ハッシュ値.dat
 * ┗/fiftyyen
 * ┗/hundredyen
 */
class Iretoku
{
	//枚数の限界
	private $limit = 100;

	//お金を入れておく場所
	private $dir_money_put_box;

	private $money_list;

	public function __construct()
	{
		$this->dir_money_put_box = dirname(__FILE__) . '/../money_put_box/';
		//newされるたびに金額を忘れてしまうのでファイルに記録する必要が出てきた。
		/*
		if(!file_exists("/tmp/money/iretoku.txt"))
		{
			touch("/tmp/money/iretoku.txt");
		}
		*/
	}

	/**
	 * お金を入れる
	 * @param money $money
	 * @return bool
	 */
	public function put_in(money $money)
	{
		if($this->limit <= $this->count_money($money))
		{
			return false;
		}

		$base_dir = $this->dir_money_put_box.$money->get_amount();
		if( ! file_exists($base_dir))
		{
			mkdir($base_dir, 0700, true);
		}

		$filename = uniqid();
		touch($base_dir."/".$filename);
		return TRUE;
	}


	/**
	 * 指定通貨の枚数を取得する
	 */
	public function count_money(money $money)
	{
		$base_dir = $this->dir_money_put_box.$money->get_amount();
		$dh  = opendir($base_dir);
		$money_count = 0;
		while (false !== ($filename = readdir($dh)))
		{
			if(is_file($base_dir."/".$filename))
			{
				$money_count++;
			}
		}
		return $money_count;
	}

	public function put_out($amount)
	{
		$rest_amount = $amount;
		$money_list = array();
		// ↓こんなのを金額が多い方から順番にやるイメージ
		// 1000円を出す
		while(true)
		{
			if(1000 <= $rest_amount)
			{
				// 入っているお金から1000円取り出す
				if($this->delete_amount(new Thousandyen()))
				{
					// 返すお金に1000円足す
					$money_list[] = new Thousandyen();
					$rest_amount -= 1000;
				}
			}
		}
	}

	/**
	 * お金を消す（取り出す）
	 * @param money $money
	 * @return bool 消せたらtrue、消せなかったらfalse
	 */
	public function delete_amount(money $money)
	{
		$base_dir = $this->dir_money_put_box.$money->get_amount();
		$dh  = opendir($base_dir);
		while (false !== ($filename = readdir($dh)))
		{
			$filepath = $base_dir."/".$filename;
			if(is_file($filepath))
			{
				unlink($filepath);
				return true;
			}
		}
		return false;
	}
}