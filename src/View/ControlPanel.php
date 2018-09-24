<?php
/**
 * Start page
 */
require_once '../Controller/PricesController.php';
require_once '../Controller/BalancesController.php';
require_once '../Model/Altcoins.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Control Panel</title>
        <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    </head>
    <body>
        <br/><br/>
        <div class="container">
            <center><h3>Балансы</h3></center>
            <table class="table" id="rule">
                <tr>
                    <th scope="row" class="align-middle border-left border-primary">Биржа</th>
                    <th scope="row"  class="align-middle border-top border-primary text-center">Название</th>
                    <th scope="row"  class="align-middle border-top border-primary text-center">Символ</th>
                    <th scope="row" class="align-middle border-top border-primary text-center">Сумма</th>
                    <th scope="row" class="align-middle border-top border-primary text-center">Цена в BTC</th>
                    <th scope="row" class="align-middle border-top border-primary text-center">Сумма в BTC</th>
                    <th scope="row" class="align-middle border-top border-primary text-center">Цена в USDT</th>
                    <th scope="row" class="align-middle border-top border-primary text-center">Сумма в USDT</th>
                    <th scope="row" class="align-middle border-top border-primary text-center">Текущий %</th>
                    <th scope="row" class="align-middle border-top border-primary text-center">Заданный %</th>
                    <th scope="row" class="align-middle border-top border-primary text-center">Действия</th>
                    <th scope="row" class="align-middle text-center border-top border-right border-primary">Доп действия</th>
                </tr>
                <tr>
                    <th scope="row" class="align-middle border-top-0 border-left border-bottom border-primary"></th>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-right border-primary"></td>
                </tr>
                <?php for ($y = 0; $y < $rows; $y++): ?>
                    <tr>
                        <th scope="row" class="align-middle border-top-0 border-left border-primary">Binance</th>
                        <td class="align-middle text-center"><?= $name[$symbol[$y]]; ?></td>
                        <td class="align-middle text-center"><?= $symbol[$y]; ?></td>
                        <td class="align-middle text-center"><?= $amount[$symbol[$y]]; ?></td>
                        <td class="align-middle text-center"><?= $PricesBtc[$symbol[$y]]; ?></td>
                        <td class="align-middle text-center"><?= round($amount_btc[$symbol[$y]], 7); ?></td>
                        <td class="align-middle text-center"><?= round($price_usdt[$symbol[$y]], 3); ?></td>
                        <td class="align-middle text-center"><?= round($amount_usdt[$symbol[$y]], 2); ?></td>
                        <td class="align-middle text-center"><?= round($percent[$symbol[$y]], 1); ?></td>
                        <td class="align-middle text-center"><?= $init_percent[$symbol[$y]]; ?></td>
                        <td class="align-middle text-center">
                            <a href="../View/SetPercent.php?name=<?= $name[$symbol[$y]]; ?>&symbol=<?= $symbol[$y]; ?>&init_percent=<?= $init_percent[$symbol[$y]]; ?>" class="btn btn-primary" style="font-size: 14px;">Изменить %</a>
                        </td>
                        <td class="align-middle text-center border-top-0 border-right border-primary">
                            <a href="../Controller/AltcoinsController.php?symbol=<?= $symbol[$y]; ?>&action=delete" class="btn btn-danger" style="font-size: 14px;"
                               onclick="return confirm('Удалить <?= $name[$symbol[$y]]; ?>?');">Удалить</a>
                        </td>
                    </tr>
                <?php endfor; ?>
                <tr>
                    <th scope="row" class="align-middle border-top-0 border-left border-bottom border-primary"></th>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-right border-primary"></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle border-top-0 border-left border-primary">Итого:</th>
                    <td class="align-middle border-top-0 border-primary"></td>
                    <td class="align-middle border-top-0 border-primary"></td>
                    <td class="align-middle border-top-0 border-primary"></td>
                    <td class="align-middle border-top-0 border-primary"></td>
                    <td class="align-middle border-top-0 border-primary"><?= round($amount_all_btc, 7); ?></td>
                    <td class="align-middle border-top-0 border-primary"></td>
                    <td class="align-middle border-top-0 border-primary"><?= round($amount_all, 3); ?></td>
                    <td class="align-middle border-top-0 border-primary text-center">100</td>
                    <td class="align-middle border-top-0 border-primary text-center"><?= $percent_all; ?></td>
                    <td class="align-middle text-center">
                        <a href="../Model/Balancing.php" class="btn btn-success" style="font-size: 14px;">Балансировать</a>
                    </td>
                    <td class="align-middle text-center border-top-0 border-right border-primary"></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle border-top-0 border-left border-bottom border-primary"></th>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-primary"></td>
                    <td class="align-middle border-top-0 border-bottom border-right border-primary"></td>
                </tr>
            </table>
            <br/>
            <center>
                <h3>
                    <a href="../View/AltcoinAdd.php" class="btn btn-primary">Добавить альткоин</a>&nbsp;&nbsp;&nbsp;
                    <a href="../View/ControlLog.php" class="btn btn-warning" target="_blank">Лог балансировки</a>
                </h3>
            </center>
            <br/>
        </div>
    </body>
</html>
