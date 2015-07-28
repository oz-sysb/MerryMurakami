<?php
namespace MerryMurakami\VendingMachine;

require_once(dirname(__FILE__) . '/config/autoload.php');

class Proceeds
{
    /**
     * @var Proceeds
     */
    private static $instance;

    private $amount;

    private function __construct()
    {
        $this->amount = 0;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Proceeds();
        }

        return self::$instance;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}
