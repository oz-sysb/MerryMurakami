<?php
require_once("../applications/CoinMech.php");

class CoinMechTest extends PHPUnit_Framework_TestCase
{
    private $CoinMech;

    public function setUp()
    {
        $this->CoinMech = new CoinMech();
    }

    public function test_usable()
    {
        $this->assertTrue($this->CoinMech->is_usable(10));
    }

    public function test_not_usable()
    {
        $this->assertFalse($this->CoinMech->is_usable(1));
        $this->assertFalse($this->CoinMech->is_usable(5));
    }
}
