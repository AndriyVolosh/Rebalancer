<?php

/**
 * Get info from DB for display log
 */
require_once '../Model/Db.php';

$q = 0;
$query = "SELECT * FROM orders ORDER BY id DESC LIMIT 100 ";
if ($result = $mysqli->query($query)) {
    $q = $result->num_rows;
    for ($i = 0; $i < $q; $i++) {
        if ($row = $result->fetch_assoc()) {
            $id[$i] = $row['id'];
            $symbol[$i] = $row['symbol'];
            $side[$i] = $row['side'];
            $init_percent[$i] = $row['init_percent'];
            $percent[$i] = $row['percent'];
            $for_balancing[$i] = $row['for_balancing'];
            $symbols[$i] = $row['symbols'];
            $order_id[$i] = $row['orderId'];
            $time[$i] = date('d M \'y', $row['transactTime'] / 1000);
            $hours[$i] = date('H:i:s', $row['transactTime'] / 1000);
            $executed_quantity[$i] = $row['executedQty'];
            $status[$i] = $row['status'];
            $price[$i] = $row['price'];
            $comission[$i] = $row['commission'];
            $comission_asset[$i] = $row['commissionAsset'];
        }
    }
}