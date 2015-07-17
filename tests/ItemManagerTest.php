<?php
/**
 * Created by PhpStorm.
 * User: nokablank
 * Date: 15/07/17
 * Time: 20:36
 */
require_once("../applications/ItemManager.php");

class ItemManagerTest extends PHPUnit_Framework_TestCase
{
	private $itemManager;

	public function setUp()
	{
		$this->itemManager = new ItemManager();
	}

	/**
	 * @test
	 */
	public function コーラ120円が5本あるか()
	{
		$expected = $this->itemManager->get_items();
		$this->assertArraySubset([["name"  => "コーラ",
								   "price" => 120,
								   "stock" => 5]], $expected);
	}
}