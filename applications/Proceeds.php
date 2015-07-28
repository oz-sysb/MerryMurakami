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

    /**
     * 売り上げ金額を取得する。
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * 売り上げ金額を加算する。
     *
     * @params int $amount 売り上げに加算する金額
     *
     * @return int
     */
    public function addAmount($amount)
    {
        $this->amount += $amount;
        return $this->amount;
    }
}
