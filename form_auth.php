<?php
require_once "head.php";
?>

<body class="background_small">
    <?php
require_once "nav.php";
?>
    <?php
if (!isset($_SESSION["id"])) { //Проверяем, авторизован ли пользователь
    ?>
    <div class="container-fluid row d-flex justify-content-center block_for_messages" style="margin-top: 125px">
        <form action="auth.php" method="post" class="d-inline-block">
            <input type="login" class="form-control btn-dark" name="login" id="login" placeholder="Введите email "
                data-toggle="tooltip" data-placement="right"
                title="Email должен быть формата example@something.domen и содержать не более 32 символов"><br>
            <input type="pass" class="form-control btn-dark" name="pass" id="pass" placeholder="Введите пароль "
                data-toggle="tooltip" data-placement="right"
                title="Пароль должен содержать не более 50 строчных/заглавных букв, цифр и специальных символов"><br>
            <div style="font-family: 'Comic Sans MS'; text-size: medium; color:antiquewhite"><?php
if (isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])) {
        echo $_SESSION["error_messages"];
        unset($_SESSION["error_messages"]);
    }
    ?></div>
            <button type="submit" name="btn_submit_auth" class="btn btn-dark btn-outline-secondary nav_sec">
                Войти
            </button>
            <button type="submit" name="btn_submit_auth" class=" btn btn-dark nav_sec" disabled>
                Зарегистрироваться
            </button>

        </form>
    </div>
    <?php
} else {
    ?>
    <div id="authorized" class="d-flex justify-content-center m-5 p-5 nav_first" style="margin-top: 8%; flex: 1;">
        Вы уже авторизованы!
    </div>
    <?php
}
?>
    <?php
require_once "footer.php";
?>