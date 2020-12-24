<?php
    header('Content-Type: text/html; charset=utf-8');
    $server = "localhost"; // имя хоста
    $username = "root"; // Имя пользователя БД
    $password = "root"; // Пароль пользователя
    $database = "register-bd"; // Имя базы данных
    $mysqli = new mysqli($server, $username, $password, $database);
    if ($mysqli->connect_errno) { 
        die("<p><strong>Ошибка подключения к БД</strong></p><p><strong>Код ошибки: </strong> ". $mysqli->connect_errno ." </p><p><strong>Описание ошибки:</strong> ".$mysqli->connect_error."</p>"); 
    }
    $mysqli->set_charset('utf8');
    $address_site = "http://localhost/";
?>