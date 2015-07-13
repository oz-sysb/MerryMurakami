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
     * @return array 余ったおつりとおつりの組み合わせを持つリスト
     */
    public function saiteki($total, $hold_moneys)
    {
        // 保有しているお金のkey名を降順で取得する
        $money_keys = array_keys($hold_moneys);
        rsort($money_keys);

        // 返すおつりのリスト
        $change = array();
        foreach ($money_keys as $coin)
        {
            // 保有数が0以下ならば調べない
            if($hold_moneys[$coin] <= 0)
            {
                continue;
            }
            // 総額が調べる対象のお金よりも大きいならループする
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
