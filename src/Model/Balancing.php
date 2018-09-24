<?php

/**
 * Balancing altcoins
 */
require_once '../Model/Altcoins.php';
require_once '../Model/SetOrder.php';
require_once '../Model/Db.php';
require_once '../Model/BinancePrivateApi.php';

for ($i = 0; $i < $rows; $i++) {
    $difference[$symbol[$i]] = $init_percent[$symbol[$i]] - $percent[$symbol[$i]];
    $for_balancing[$symbol[$i]] = $difference[$symbol[$i]] / 100 * $amount_all_btc / $PricesBtc[$symbol[$i]];
    if ($for_balancing[$symbol[$i]] != 0 && $symbol[$i] != 'ETH') {
        if ($for_balancing[$symbol[$i]] < 0) {
            $side = "sell";
            $for_balancing[$symbol[$i]] = $for_balancing[$symbol[$i]] * (-1);
        } else
            $side = "buy";

        set_order($api, $mysqli, $symbol[$i], $side, $for_balancing[$symbol[$i]], $init_percent[$symbol[$i]], $percent[$symbol[$i]]);
    }
}
header('Location: ../View/ControlPanel.php');
