<?php

/**
 * Функция выполняет подключение к БД
 * @return bool возвращает true или false
 */

function connect()
{
    static $connect = null;
    
    if ($connect == null) {

        $host = $_SERVER['HTTP_HOST']; 
        $user = 'root'; 
        $password = ''; 
        $dsn = 'mysql:host=localhost;dbname=homeWork20';

        $connect = new PDO($dsn, $user, $password) or die('connect Error');

        /* //шаблон запроса
        $stmt = $pdo->prepare('INSERT INTO stock(name) VALUES(:name)');
        //используем шаблон запрос на добавление склада
        $stmt->execute([':name' => 'Склад 1']); */

        // $stmt = $pdo->query('SELECT * FROM stock');

        /* while ($row = $stmt->fetch()) {
            echo $row['name'] . "<br>";
        } */
    } 

    var_dump($connect);
    return $connect;
}
