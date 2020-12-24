<?php
session_start();
$_SESSION["error_messages"] = '';

$server = "localhost"; // имя хоста
$username = "root"; // Имя пользователя БД
$password = "root"; // Пароль пользователя
$database = "register-bd"; // Имя базы данных
$db = new PDO("mysql:host=$server;dbname=$database", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if (isset($_POST["btn_submit_journal"])) {
    $date = $_POST['date'];
    $reg_date = "/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/";
    if (!preg_match($reg_date, $date))
    {
        $_SESSION["error_messages"] .= "<p class='message_error'>Дата введена неверно!</p>"; // Сохраняем в сессию сообщение об ошибке
                header("HTTP/1.1 301 Moved Permanently"); //Возвращаем пользователя на страницу авторизации
                header("Location: " . $address_site . "/journal.php");
                exit();
    }
    $part_num = $_POST['part_num'];
    if (!is_numeric($part_num)||$part_num == 0)
    {
        $_SESSION["error_messages"] .= "<p class='message_error'>Артикул введен неверно!</p>"; // Сохраняем в сессию сообщение об ошибке
                header("HTTP/1.1 301 Moved Permanently"); //Возвращаем пользователя на страницу авторизации
                header("Location: " . $address_site . "/journal.php");
                exit();
    }
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    if (!is_numeric($quantity))
    {
        $_SESSION["error_messages"] .= "<p class='message_error'>Количество введено неверно!</p>"; // Сохраняем в сессию сообщение об ошибке
                header("HTTP/1.1 301 Moved Permanently"); //Возвращаем пользователя на страницу авторизации
                header("Location: " . $address_site . "/journal.php");
                exit();
    }
    $data = array(
        'date' => "$date",
        'part_num' => "$part_num",
        'name' => "$name",
        'quantity' => "$quantity",
    );
    $sql = "INSERT INTO journal(date, part_num, name, quantity)" .
        " VALUES(:date, :part_num, :name, :quantity)";
    $statement = $db->prepare($sql);
    $statement->execute($data);
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $address_site . "/journal.php");
} else {
    exit("<p><strong>Внимание, сработала защита от уязвимости!</strong> Вы зашли на страницу занесения данных в таблицу напрямую.
    Вы можете перейти на <a href=" . $address_site . "> главную страницу и занести данные в таблицу через специальную форму</a>.</p>");
}