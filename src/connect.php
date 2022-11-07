<?php

/**
 * Функция выполняет подключение к БД
 * @return bool возвращает true или false
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
            $dbh = new PDO($dsn, $user, $password, array(
                PDO::ATTR_PERSISTENT => true
            ));

            $stmt = $dbh->query(
                "SELECT users.surname as 'Фамилия', users.name 'Имя', 
                    users.middle_name as 'Отчество', 
                    users.login as 'Логин', 
                    passwords.password as 'Пароль'
                        FROM `home_work_20`.`users`
                            LEFT JOIN passwords ON users.id = passwords.user_id;"
                );

            var_dump($stmt->fetch());
            // while ($row = $stmt->fetch()) {
            // echo $row . "<br>";
            // }

            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    } 

    return $dbh;
}
