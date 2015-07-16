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
        $this->assertTrue($this->CoinMech->is_usable(new tenyen()));
    }

    public function test_not_usable()
    {
        $this->assertFalse($this->CoinMech->is_usable(new oneyen()));
        $this->assertFalse($this->CoinMech->is_usable(new fiveyen()));
    }
}
