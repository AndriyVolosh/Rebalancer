<?php

/**
 * Get info about altcoins from DB and calculate percents
 */
require_once '../Model/Db.php';
require_once '../Controller/PricesController.php';
require_once '../Controller/BalancesController.php';

$amount_all_btc = $amount_all = $percent_all = 0;
$symbol = $name = [];

$query = "SELECT * FROM `altcoins` ORDER BY `id` ASC";
if ($result = $mysqli->query($query)) {
    $rows = $result->num_rows;
    for ($i = 0; $i < $rows; $i++) {
        $row = $result->fetch_assoc();
        $symbol[$i] = $row['symbol'];
        $name[$symbol[$i]] = $row['name'];
        $amount_btc[$symbol[$i]] = $amount[$symbol[$i]] * $PricesBtc[$symbol[$i]];
        $amount_all_btc += $amount_btc[$symbol[$i]];
        $price_usdt[$symbol[$i]] = $PricesBtc[$symbol[$i]] * $PricesBtc['BTCUSDT'];
        $amount_usdt[$symbol[$i]] = $amount[$symbol[$i]] * $price_usdt[$symbol[$i]];
        $amount_all += $amount_usdt[$symbol[$i]];
        $init_percent[$symbol[$i]] = $row['percent'];
        $percent_all += $init_percent[$symbol[$i]];
    }
    for ($i = 0; $i < $rows; $i++) {
        if ($amount_all != 0) {
            $percent[$symbol[$i]] = $amount_usdt[$symbol[$i]] / $amount_all * 100;
        } else
            $percent[$symbol[$i]] = 100;
    }
}