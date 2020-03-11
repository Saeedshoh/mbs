<?php
define('IP', 'mbs.tj');
$db = mysqli_connect('192.168.1.20', 'root', '', 'mbs');
	if (!$db) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

 ?>