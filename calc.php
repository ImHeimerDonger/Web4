<?php
require_once "head.php";
?>
<body class="background_small">
    <?php
require_once "nav.php";
?>
    <div class="container-fluid d-block d-flex justify-content-center" style="margin-top: 125px">
        <form action="" method="post" class="d-inline-block calculate-form">
            <input type="text" name="first_num" class="form-control btn-dark" placeholder="Введите первое число"><br>
            <input type="text" name="sec_num" class="form-control btn-dark" placeholder="Введите первое число"><br>
            <div class="container-fluid d-row d-flex">
            <select class="btn-dark p-2 rounded-lg shadow-lg " name="operation">
                <option value='plus'>+ </option>
                <option value='minus'>- </option>
                <option value="multiply">* </option>
                <option value="divide">/ </option>
            </select><br>
            <input class="nav_sec btn btn-dark btn-outline-secondary ml-2" type="submit" name="answer" value="Вычислить"><br>
            </div>
    <?php
if (isset($_POST['answer'])) {
    $first_num = $_POST['first_num'];
    $sec_num = $_POST['sec_num'];
    $operation = $_POST['operation'];
    if (!$operation || (!$first_num && $first_num != '0') || (!$sec_num && $sec_num != '0')) {
        $error_result = 'Одно из полей ввода чисел не заполнено!';
    } else {
        if (!is_numeric($first_num) || !is_numeric($sec_num)) {
            $error_result = "Вы ввели не число!";
        } else {
            switch ($operation) {
                case 'plus':
                    $result = $first_num + $sec_num;
                    break;
                case 'minus':
                    $result = $first_num - $sec_num;
                    break;
                case 'multiply':
                    $result = $first_num * $sec_num;
                    break;
                case 'divide':
                    if ($sec_num == '0') {
                        $error_result = "Нельзя делить на ноль!";
                    } else {
                        $result = $first_num / $sec_num;
                    }
                    break;
            }
        }
    }
    ?>
    <div style="font-family: 'Comic Sans MS'; text-size: medium; color:antiquewhite" align="center" class="mx-n5 mt-3"><?php
    if (isset($error_result) && !empty($error_result)) {
        echo "Последняя ошибка: $error_result";
    } else if (isset($result) && !empty($result)) {
        echo "Последний ответ: $result";
    }
    ?>
    </div>
    <?php
}
?>
</form>
</div>
    <?php
require_once "footer.php";
?>