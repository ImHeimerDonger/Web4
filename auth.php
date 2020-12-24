<?php
session_start(); //Запускаем сессию
require_once "data_base_con.php"; //подключаем бд
$address_site = "http://localhost/";
$_SESSION["error_messages"] = ''; //Объявляем ячейку для добавления ошибок
//Проверяем была ли отправлена форма, то есть была ли нажата кнопка Войти.
if (isset($_POST["btn_submit_auth"])) {
    $login = trim($_POST["login"]); //Обрезаем пробелы
    if (isset($_POST["login"])) { //Обработка логина
        if (!empty($login)) {
            $login = htmlspecialchars($login, ENT_QUOTES);
            $reg_login = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i"; //Проверерка логина регулярным выражением
            if (!preg_match($reg_login, $login)) {
                $_SESSION["error_messages"] .= "<p class='message_error'>Введен неверный email/пароль!</p>"; // Сохраняем в сессию сообщение об ошибке
                header("HTTP/1.1 301 Moved Permanently"); //Возвращаем пользователя на страницу авторизации
                header("Location: " . $address_site . "/form_auth.php");
                exit();
            }
        } else {
            $_SESSION["error_messages"] .= "<p class='message_error' >Поле для ввода email не может быть пустым!</p>";
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "/form_auth.php");
            exit();
        }
    } else {
        $_SESSION["error_messages"] .= "<p class='message_error' >Поле для ввода email не найдено!</p>";
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "/form_auth.php");
        exit();
    }
    if (isset($_POST["pass"])) { //обработка пароля
        $pass = trim($_POST["pass"]);
        if (!empty($pass)) {
            $pass = htmlspecialchars($pass, ENT_QUOTES);
            $pass = md5($pass);
        } else {
            $_SESSION["error_messages"] .= "<p class='message_error' >Поле для ввода пароля не может быть пустым!</p>";
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "/form_auth.php");
            exit();
        }
    } else {
        $_SESSION["error_messages"] .= "<p class='message_error' >Поле для ввода пароля не найдено!</p>";
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "/form_auth.php");
        exit();
    }
    $result_query = $mysqli->query("SELECT id, pass FROM `users` WHERE login='$login'");
    $row = mysqli_fetch_array($result_query);
    if ($row['pass'] == $pass) {
        $_SESSION['id'] = $row['id']; // Сохраняем данные в массив ссесий, если они совпадают с массивом данных
        $_SESSION['login'] = $login;
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "/index.php");
    } else {
        $_SESSION["error_messages"] .= "<p class='message_error' >Введен неверный email/пароль!</p>";
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "/form_auth.php");
        exit();
    }
} else {
    exit("<p><strong>Внимание, сработала защита от уязвимости!</strong> Вы зашли на страницу аутентификации напрямую.
    Вы можете перейти на <a href=" . $address_site . "> главную страницу и авторизоваться через специальную форму</a>.</p>");
}