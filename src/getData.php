<?php

/**
 * Функция выполняет подключение к БД
 * выполняет запрос к БД и возвращает какие-то данные
 * @param string $query принимаемая строка запроса к БД
 * @param $queryParam параметры которые будут подставлены в запрос, 
 *        по умолчанию имеет значение NULL, 
 *        если параметр не указан то запрос будет без параметров
 * @return array результат запроса
 */

function getData(string $sqlQuery, $queryParam = NULL) : array
{
    $stmt = connect()->prepare($sqlQuery);
    is_null($queryParam) ? $stmt->execute() : $stmt->execute([$queryParam]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
