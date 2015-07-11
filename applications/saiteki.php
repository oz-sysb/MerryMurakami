<?php

class Saiteki
{
    /**
     * コンストラクタ
     */
    function __construct()
    {
    }

    /**
     * 釣り銭の組み合わせを所持しているお金の量から決定する
     *
     * @param int   $total       おつりの総額
     * @param array $hold_moneys 保有しているお金
     *
     * @return array 余ったおつり，おつりの組み合わせ
     */
    public function saiteki($total, $hold_moneys)
    {
        $change = array();
        foreach (array(1000, 500, 100, 50, 10) as $coin)
        {
            for (; $total >= $coin; $total -= $coin)
            {
                array_push($change, $coin);
                $hold_moneys[$coin]--;
            }
        }

        return array(
            'total' => $total,
            'charge' => $change
        );
    }
}
