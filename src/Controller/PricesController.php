<?php

/**
 * Get prices from exchange
 */
require_once '../Model/BinancePublicApi.php';

$url = "v1/ticker/allPrices";
$allPrices = $api_pub->request($url);

foreach ($allPrices as $coin) {
    $symbol = $coin->symbol;
    if (substr($symbol, -3) == "BTC") {
        $symbol = str_replace("BTC", '', $symbol);
        $PricesBtc[$symbol] = $coin->price;
    } elseif ($symbol == "BTCUSDT") {
        $PricesBtc['BTCUSDT'] = $coin->price;
    }
}
$PricesBtc['BTC'] = 1;
