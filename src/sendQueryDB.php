<?php

/**
 * Функция выполняет подключение к БД
 * выполняет запрос к БД и возвращает какие-то данные
 * @param string $query принимаемая строка запроса к БД
 * @param $queryParam массив параметров который будет подставлен в запрос, 
 *        по умолчанию имеет значение NULL, 
 *        если параметр не указан то запрос будет без параметров
 * @return array возвращае массив, результат запроса
 */

function sendQueryDB(string $sqlQuery, $queryParam = NULL) : array
{
    $stmt = connect()->prepare($sqlQuery);
    
    if (is_null($queryParam)) {
        $stmt->execute();
    } else {
        $stmt->execute($queryParam);
    }

    return [
        'lastInsertId' => connect()->lastInsertId(),
        'responseData' => $stmt->fetchAll(PDO::FETCH_ASSOC)
    ];
}
