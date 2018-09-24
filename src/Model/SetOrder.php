<?php

/**
 * Set info for new order
 * @param object $mysqli
 * @param string $symbol
 * @param string $side
 * @param float $for_balancing
 * @param float $init_percent
 * @param float $percent
 */
function set_order($api, $mysqli, $symbol, $side, $for_balancing, $init_percent, $percent)
{
    $for_balancing = round($for_balancing, 2);
    if ($symbol == 'BCN' || $symbol == 'XRP')
        $for_balancing = round($for_balancing, 0);
    if ($for_balancing != 0)
        new_order($api, $mysqli, $symbol, $side, $for_balancing, $init_percent, $percent);
}

/**
 * Send new order to exchange
 * @param BinancePrivateApi $api
 * @param object $mysqli
 * @param string $symbol
 * @param string $side
 * @param float $for_balancing
 * @param float $init_percent
 * @param float $percent
 */
function new_order($api, $mysqli, $symbol, $side, $for_balancing, $init_percent, $percent)
{
    echo 'Setting new order ...<br>';
    $url = "v3/order";
    //$url = "v3/order/test";
    $params = [];
    $params['symbol'] = $symbol . 'ETH';
    if ($symbol == 'BTC')
        $params['symbol'] = 'ETH' . $symbol;
    $params['side'] = $side;
    $params['type'] = 'MARKET';
    $params['quantity'] = $for_balancing;
    $params['newOrderRespType'] = 'FULL';
    $res = $api->signedRequest($url, $params, "POST");
    $res_json = json_decode($res);
    echo '<br>';
    $price = $res_json->fills[0]->price;
    $commission = $res_json->fills[0]->commission;
    $commissionAsset = $res_json->fills[0]->commissionAsset;
    $query = "INSERT INTO `orders` VALUES (null,'$symbol','$side',$init_percent,$percent,$for_balancing,'$res_json->symbol',$res_json->orderId,$res_json->transactTime,"
            . "$res_json->executedQty,'$res_json->status',$price,$commission,'$commissionAsset')";
    if (!$mysqli->query($query)) {
        echo 'NOT write in DB';
    }
}
