<?php


namespace App\Core;


class DB
{
    public static function Connection(){

        // Получаем параметры подключения из файла
        $paramsPath = APPLICATION_PATH.'Core/paramms.php';
        $params = include($paramsPath);

        // Устанавливаем соединение
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new \PDO($dsn, $params['user'], $params['password']);


        // Задаем кодировку
        $db->exec("set names utf8");

        return $db;

    }
}