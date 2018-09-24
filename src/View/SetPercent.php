<?php
$name = $_GET['name'];
$symbol = $_GET['symbol'];
$init_percent = $_GET['init_percent'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Установить процент</title>
        <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    </head>
    <body>
        <br/><br/>
        <div class="container">
            <center><h3>Установить процент альткоина в портфеле</h3></center>
            <form action="../Controller/AltcoinsController.php">
                <input type="hidden" name="action" value="setPercent">
                <table class="table">
                    <tr>
                        <th scope="row" class="align-middle border-left border-primary">Название</th>
                        <td class="align-middle border-top  border-primary"><?= $name; ?></td>
                        <th scope="row" class="align-middle border-top border-primary text-center">Символ</th>
                        <td class="align-middle border-top  border-primary">
                            <?= $symbol; ?>
                            <input type="hidden" name="symbol" value="<?= $symbol; ?>">
                        </td>
                        <th scope="row" class="align-middle border-top border-primary text-center">% в портфеле</th>
                        <td class="align-middle border-top border-primary">
                            <input type="text" name="percent"  size="4" placeholder="<?= $init_percent; ?>">
                        </td>
                        <td class="align-middle border-right border-primary"><button type="submit" class="btn btn-primary">Установить %</button></td>

                    </tr>

                    <tr>
                        <td class="border-top-0 border-left border-bottom border-primary"></td>
                        <td class="border-top-0 border-bottom border-primary"></td>
                        <td class="border-top-0 border-bottom border-primary"></td>
                        <td class="border-top-0 border-bottom border-primary"></td>
                        <td class="border-top-0 border-bottom border-primary"></td>
                        <td class="border-top-0 border-bottom border-primary"></td>
                        <td class="border-top-0 border-bottom border-right border-primary"></td>
                    </tr>
                </table>
            </form>
    </body>
</html>
