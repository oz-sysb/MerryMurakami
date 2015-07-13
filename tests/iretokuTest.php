<?php
require_once(dirname(__FILE__) . '/../applications/iretoku.php');
class iretokuTest extends PHPUnit_Framework_TestCase
{
	private $iretoku_obj;
    private $okane_obj;
    private $kingaku;
    private $ok_okane_obj_array;
    private $ng_okane_obj_array;
	/**
	 * 初期化関数
	 *
	 * @return void
	 */
	public function setup()
	{
		$this->iretoku_obj = new Iretoku();
        $this->ok_okane_obj = new Tenyen();
        $this->ng_okane_obj = new Fiftyyen;
        $this->kingaku = 60;
        $this->ok_okane_obj_array = array();
        $this->ng_okane_obj_array = ;
	}

	/**
	 * 入れとく関数 正常系
	 *
	 * @return void
	 */
	public function testIretokuOK()
	{
		$result = $this->iretoku_obj->iretoku($this->okane_obj);
		$this->assertEquals(TRUE, $result);
	}
	/**
	 * 入れとく関数 異常系
	 *
	 * @return void
	 */
	public function testIretokuNG()
	{
		$result = $this->iretoku_obj->iretoku($this->okane_obj);
		$this->assertEquals(FALSE, $result);
	}

    /**
     * @dataProvider 正常なおつりの内訳Provider
     */
    public function testいわれた分出す($total, $hold_moneys, $expected)
    {
        $result = $this->saiteki_obj->saiteki($total, $hold_moneys);
        $this->assertEquals($expected, $result['charge']);
    }

    /**
     * データプロバイダ
     * おつりの残りを確かめる
     *
     * @return array
     */
    public function いわれた分出すProvider()
    {
        $hold_moneys = array(
            1000 => 5,
            500 => 5,
            100 => 5,
            50 => 5,
            10 => 5,
        );

        return array(
            array(0, $hold_moneys, array()),
            array(10, $hold_moneys, array(10)),
            array(20, $hold_moneys, array(10, 10)),
            array(30, $hold_moneys, array(10, 10, 10)),
            array(40, $hold_moneys, array(10, 10, 10, 10)),
            array(50, $hold_moneys, array(50)),
            array(60, $hold_moneys, array(50, 10)),
            array(70, $hold_moneys, array(50, 10, 10)),
            array(80, $hold_moneys, array(50, 10, 10, 10)),
            array(90, $hold_moneys, array(50, 10, 10, 10, 10)),
            array(100, $hold_moneys, array(100)),
            array(110, $hold_moneys, array(100, 10)),
            array(120, $hold_moneys, array(100, 10, 10)),
            array(130, $hold_moneys, array(100, 10, 10, 10)),
            array(140, $hold_moneys, array(100, 10, 10, 10, 10)),
            array(150, $hold_moneys, array(100, 50)),
            array(160, $hold_moneys, array(100, 50, 10)),
            array(170, $hold_moneys, array(100, 50, 10, 10)),
            array(180, $hold_moneys, array(100, 50, 10, 10, 10)),
            array(190, $hold_moneys, array(100, 50, 10, 10, 10, 10)),
            array(200, $hold_moneys, array(100, 100)),
            array(210, $hold_moneys, array(100, 100, 10)),
            array(220, $hold_moneys, array(100, 100, 10, 10)),
            array(230, $hold_moneys, array(100, 100, 10, 10, 10)),
            array(240, $hold_moneys, array(100, 100, 10, 10, 10, 10)),
            array(250, $hold_moneys, array(100, 100, 50)),
            array(260, $hold_moneys, array(100, 100, 50, 10)),
            array(270, $hold_moneys, array(100, 100, 50, 10, 10)),
            array(280, $hold_moneys, array(100, 100, 50, 10, 10, 10)),
            array(290, $hold_moneys, array(100, 100, 50, 10, 10, 10, 10)),
            array(300, $hold_moneys, array(100, 100, 100)),
            array(310, $hold_moneys, array(100, 100, 100, 10)),
            array(320, $hold_moneys, array(100, 100, 100, 10, 10)),
            array(330, $hold_moneys, array(100, 100, 100, 10, 10, 10)),
            array(340, $hold_moneys, array(100, 100, 100, 10, 10, 10, 10)),
            array(350, $hold_moneys, array(100, 100, 100, 50)),
            array(360, $hold_moneys, array(100, 100, 100, 50, 10)),
            array(370, $hold_moneys, array(100, 100, 100, 50, 10, 10)),
            array(380, $hold_moneys, array(100, 100, 100, 50, 10, 10, 10)),
            array(390, $hold_moneys, array(100, 100, 100, 50, 10, 10, 10, 10)),
            array(400, $hold_moneys, array(100, 100, 100, 100)),
            array(410, $hold_moneys, array(100, 100, 100, 100, 10)),
            array(420, $hold_moneys, array(100, 100, 100, 100, 10, 10)),
            array(430, $hold_moneys, array(100, 100, 100, 100, 10, 10, 10)),
            array(440, $hold_moneys, array(100, 100, 100, 100, 10, 10, 10, 10)),
            array(450, $hold_moneys, array(100, 100, 100, 100, 50)),
            array(460, $hold_moneys, array(100, 100, 100, 100, 50, 10)),
            array(470, $hold_moneys, array(100, 100, 100, 100, 50, 10, 10)),
            array(480, $hold_moneys, array(100, 100, 100, 100, 50, 10, 10, 10)),
            array(490, $hold_moneys, array(100, 100, 100, 100, 50, 10, 10, 10, 10)),
            array(500, $hold_moneys, array(500)),
            array(510, $hold_moneys, array(500, 10)),
            array(520, $hold_moneys, array(500, 10, 10)),
            array(530, $hold_moneys, array(500, 10, 10, 10)),
            array(540, $hold_moneys, array(500, 10, 10, 10, 10)),
            array(550, $hold_moneys, array(500, 50)),
            array(560, $hold_moneys, array(500, 50, 10)),
            array(570, $hold_moneys, array(500, 50, 10, 10)),
            array(580, $hold_moneys, array(500, 50, 10, 10, 10)),
            array(590, $hold_moneys, array(500, 50, 10, 10, 10, 10)),
            array(600, $hold_moneys, array(500, 100)),
            array(610, $hold_moneys, array(500, 100, 10)),
            array(620, $hold_moneys, array(500, 100, 10, 10)),
            array(630, $hold_moneys, array(500, 100, 10, 10, 10)),
            array(640, $hold_moneys, array(500, 100, 10, 10, 10, 10)),
            array(650, $hold_moneys, array(500, 100, 50)),
            array(660, $hold_moneys, array(500, 100, 50, 10)),
            array(670, $hold_moneys, array(500, 100, 50, 10, 10)),
            array(680, $hold_moneys, array(500, 100, 50, 10, 10, 10)),
            array(690, $hold_moneys, array(500, 100, 50, 10, 10, 10, 10)),
            array(700, $hold_moneys, array(500, 100, 100)),
            array(710, $hold_moneys, array(500, 100, 100, 10)),
            array(720, $hold_moneys, array(500, 100, 100, 10, 10)),
            array(730, $hold_moneys, array(500, 100, 100, 10, 10, 10)),
            array(740, $hold_moneys, array(500, 100, 100, 10, 10, 10, 10)),
            array(750, $hold_moneys, array(500, 100, 100, 50)),
            array(760, $hold_moneys, array(500, 100, 100, 50, 10)),
            array(770, $hold_moneys, array(500, 100, 100, 50, 10, 10)),
            array(780, $hold_moneys, array(500, 100, 100, 50, 10, 10, 10)),
            array(790, $hold_moneys, array(500, 100, 100, 50, 10, 10, 10, 10)),
            array(800, $hold_moneys, array(500, 100, 100, 100)),
            array(810, $hold_moneys, array(500, 100, 100, 100, 10)),
            array(820, $hold_moneys, array(500, 100, 100, 100, 10, 10)),
            array(830, $hold_moneys, array(500, 100, 100, 100, 10, 10, 10)),
            array(840, $hold_moneys, array(500, 100, 100, 100, 10, 10, 10, 10)),
            array(850, $hold_moneys, array(500, 100, 100, 100, 50)),
            array(860, $hold_moneys, array(500, 100, 100, 100, 50, 10)),
            array(870, $hold_moneys, array(500, 100, 100, 100, 50, 10, 10)),
            array(880, $hold_moneys, array(500, 100, 100, 100, 50, 10, 10, 10)),
            array(890, $hold_moneys, array(500, 100, 100, 100, 50, 10, 10, 10, 10)),
            array(900, $hold_moneys, array(500, 100, 100, 100, 100)),
            array(910, $hold_moneys, array(500, 100, 100, 100, 100, 10)),
            array(920, $hold_moneys, array(500, 100, 100, 100, 100, 10, 10)),
            array(930, $hold_moneys, array(500, 100, 100, 100, 100, 10, 10, 10)),
            array(940, $hold_moneys, array(500, 100, 100, 100, 100, 10, 10, 10, 10)),
            array(950, $hold_moneys, array(500, 100, 100, 100, 100, 50)),
            array(960, $hold_moneys, array(500, 100, 100, 100, 100, 50, 10)),
            array(970, $hold_moneys, array(500, 100, 100, 100, 100, 50, 10, 10)),
            array(980, $hold_moneys, array(500, 100, 100, 100, 100, 50, 10, 10, 10)),
            array(990, $hold_moneys, array(500, 100, 100, 100, 100, 50, 10, 10, 10, 10))
        );
    }
}