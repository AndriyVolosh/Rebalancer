<?php
require_once '../Model/Log.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Control log</title>
        <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    </head>
    <body>
        <br>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle border-left border-primary">Номер</th>
                        <th scope="col" class="align-middle border-top border-primary text-center">Символ</th>
                        <th scope="col" class="align-middle border-top border-primary text-center">Side</th>
                        <th scope="col" class="align-middle border-top border-primary text-center">Заданный %</th>
                        <th scope="col" class="align-middle border-top border-primary text-center">Текущий %</th>
                        <th scope="col" class="align-middle border-top border-primary text-center">Необходимая сумма</th>
                        <th scope="col" class="align-middle border-top border-primary text-center">Пара</th>
                        <th scope="col" class="align-middle border-top border-primary text-center">Order ID</th>
                        <th scope="col" class="align-middle border-top border-primary text-center">Время</th>
                        <th scope="col" class="align-middle border-top border-primary text-center">Сумма ордера</th>
                        <th scope="col" class="align-middle border-top border-primary text-center">Цена</th>
                        <th scope="col" class="align-middle text-center border-top border-right border-primary">Комиссия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $q; $i++): ?>
                        <tr>
                            <td class="border-right-0 border text-center border-primary"><?= $id[$i]; ?></td>
                            <td class="border-right-0 border border-left-0 border-primary"><?= $symbol[$i]; ?></td>
                            <td class="border-right-0 border border-left-0 text-center border-primary"><?= $side[$i]; ?></td>
                            <td class="border-right-0 border border-left-0 text-center border-primary"><?= $init_percent[$i]; ?></td>
                            <td class="border-right-0 border border-left-0 text-center  border-primary"><?= round($percent[$i], 1); ?></td>
                            <td class="border-right-0 border border-left-0 text-center  border-primary"><?= $for_balancing[$i]; ?></td>
                            <td class="border-right-0 border border-left-0 text-center  border-primary"><?= $symbols[$i]; ?></td>
                            <td class="border-right-0 border border-left-0  border-primary"><?= $order_id[$i]; ?></td>
                            <td class="border-right-0 border border-left-0  border-primary" style="white-space: nowrap"><?= $time[$i]; ?><br><?= $hours[$i]; ?></td>
                            <td class="border-right-0 border border-left-0 text-center border-primary"><?= $executed_quantity[$i]; ?></td>
                            <td class="border-right-0 border border-left-0  border-primary"><?= $price[$i]; ?></td>
                            <td class="border-left-0 border border-primary" style="white-space: nowrap"><?= $comission[$i] . ' ' . $comission_asset[$i]; ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
    </body>
</html>
