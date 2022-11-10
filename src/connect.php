<?php

/**
 * Функция выполняет подключение к БД
 * @return bool статус соединение с БД
 */

function connect()
{
    static $dbh = null;
    
    if ($dbh == null) {
        $host = $_SERVER['HTTP_HOST']; 
        $user = 'root'; 
        $password = ''; 
        $dsn = 'mysql:host=localhost;dbname=home_work_20';
        
        try {
            $dbh = new PDO($dsn, $user, $password, [PDO::ATTR_PERSISTENT => true]);
        } catch (PDOException $error) {
            die();
            echo "Error!: " . $error->getMessage() . "<br/>";
        }
    } 

    return $dbh;
}
