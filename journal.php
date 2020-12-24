<?php
require_once "head.php";
?>

<body class="background_scroll">
    <?php
require_once "nav.php";
?>
    <table class="table table-hover table-dark table-striped table-bordered table-responsive-lg" style="margin:0 auto 115px; width:100.25%">
        <thead>
            <tr>
                <th scope="col">№ п/п</th>
                <th scope="col">Дата розничной продажи</th>
                <th scope="col">Артикул</th>
                <th scope="col">Наименование продукции</th>
                <th scope="col">Количество (штук)</th>
            </tr>
        </thead>
        <tbody>
            <?php
$con = new mysqli("localhost", "root", "root", "register-bd");
$execItems = $con->query("SELECT id, date, part_num, name, quantity FROM `journal` WHERE id BETWEEN 1 AND 20 ");
while ($infoItems = $execItems->fetch_array()) {
    echo "<tr>
<td>" . $infoItems['id'] . "</td>
<td>" . $infoItems['date'] . "</td>
<td>" . $infoItems['part_num'] . "</td>
<td>" . $infoItems['name'] . "</td>
<td>" . $infoItems['quantity'] . "</td>
</tr>
";
}
?>
            <form action="bd_insert.php" method="POST">
                <tr>
                    <td align="center"><input type="submit" value="Занести в таблицу" name="btn_submit_journal"
                            class="btn btn-dark btn-outline-secondary indexMid2 text-white mt-2 mx-n5">
                        <div class="mt-2" style="font-family: 'Comic Sans MS'; text-size: medium; color:antiquewhite"><?php
if (isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])) {
    echo $_SESSION["error_messages"];
    unset($_SESSION["error_messages"]);
}
?></div>
                    </td>
                    <td align="center"><input type="text" name="date"
                            placeholder="Введите дату продажи в формате ГГГГ-ММ-ДД" required
                            class="form-control btn-dark mt-2 mx-n5">
                    </td>
                    <td align="center"> <input type="text" name="part_num" placeholder="Введите артикул" required
                            class="form-control btn-dark mt-2 mx-n5"></td>
                    <td align="center"><input type="text" name="name" placeholder="Введите наименование продукции"
                            required class="form-control btn-dark mt-2 mx-n5"></td>
                    <td align="center"><input type="text" name="quantity" placeholder="Введите количество (штук)"
                            required class="form-control btn-dark mt-2 mx-n5"></td>
                </tr>
            </form>
        </tbody>
    </table>
    <?php
require_once "footer.php";
?>