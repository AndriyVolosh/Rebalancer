<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Добавить альткоин</title>
        <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    </head>
    <body>
        <br/><br/>
        <div class="container">
            <center><h3>Добавить альткоин</h3></center>
            <form action="../Controller/AltcoinsController.php">
                <input type="hidden" name="action" value="add">
                <table class="table">
                    <tr>
                        <th scope="row" class="align-middle border-left border-primary">Название</th>
                        <td class="border-top  border-primary"><input type="text" name="name"></td>
                        <th scope="row" class="align-middle border-top border-primary text-center">Символ</th>
                        <td class="align-middle border-top  border-primary">
                            <input type="text" name="symbol">
                        </td>
                        <th scope="row" class="align-middle border-top border-primary text-center">% в портфеле</th>
                        <td class="align-middle border-top border-right border-primary">
                            <input type="text" name="percent" placeholder="0">
                        </td>
                    </tr>

                    <tr>
                        <td class="border-top-0 border-left border-bottom border-primary"></td>
                        <td class="border-top-0 border-bottom border-primary"></td>
                        <td class="border-top-0 border-bottom border-primary"></td>
                        <td class="align-middle border-top-0 border-bottom border-primary"><button type="submit" class="btn btn-primary">Добавить</button></td>
                        <td class="border-top-0 border-bottom border-primary"></td>
                        <td class="border-top-0 border-bottom border-right border-primary"></td>
                    </tr>
                </table>
                <br/><br/>
                <div>
                    Примечания:<br>
                    1. Название выбираете любое удобное.<br>
                    2. Символ <strong>должен</strong> точно соответствовать биржевому символу.<br>
                    3. Процент в портфеле опциональный. По-умолчанию - ноль.<br>

                </div>
            </form>
    </body>
</html>
