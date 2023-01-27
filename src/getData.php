<?php

/**
 * Функция выполняет подключение к БД
 * выполняет запрос к БД и возвращает какие-то данные
 * @param string $query принимаемая строка запроса к БД
 * @param $queryParam параметры которые будут подставлены в запрос
 * @return array результат запроса
 */

function getData(string $query, $queryParam) : array
{
    $stmt = connect()->prepare($query);
    $stmt->execute([$queryParam]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
