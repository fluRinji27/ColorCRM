<?php

class Db
{

    public static function getConnection()
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);


        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password'], $options);

        if (!$db) {
            echo 'Fatal error DataBase connection ! При возникновении данной ошибки просьба сообщить о ней. flurinji@yandex.ru';
        }
        return $db;
    }
}
