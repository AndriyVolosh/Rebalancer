<?php

/**
 * Get info about account and his balances
 */
require_once '../Model/BinancePrivateApi.php';

$url = "v3/account";
$res = $api->signedRequest($url);
$account = json_decode($res)->balances;

foreach ($account as $balance) {
    $name = $balance->asset;
    $amount[$name] = $balance->free;
}
