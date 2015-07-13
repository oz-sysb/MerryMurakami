<?php
/**
 * Created by PhpStorm.
 * User: nagayamashouta
 * Date: 15/07/13
 * Time: 20:29
 */
require_once(dirname(__FILE__) . '/../applications/saiteki.php');

class iretoku
{
    //枚数の限界？持っているお金の限界？いったん枚数として実装
    private $limit = 10;

    private $okane = array(
                    10 => 10,
                    50 => 10,
                    100 => 10,
                    500 => 10,
                    1000 => 10
                    );

    public function __construct()
    {
        //newされるたびに金額を忘れてしまうのでファイルに記録する必要が出てきた。
        /*
        if(!file_exists("/tmp/money/iretoku.txt"))
        {
            touch("/tmp/money/iretoku.txt");
        }
        */
    }

    public function iretoku($okane_obj)
    {
        $tounyuu_kingaku = $okane_obj->get_amount();
        if(array_key_exists($tounyuu_kingaku, $this->okane))
        {
            $this->okane[$tounyuu_kingaku]++;
        }
        if($this->limit < $this->okane[$tounyuu_kingaku])
        {
            return FALSE;
        }
        return TRUE;
    }

    public function iwaretabundasu($kingaku)
    {
        $saiteki = new Saiteki();
        return $saiteki->saiteki($kingaku, $this->okane);
    }
}