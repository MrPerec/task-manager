<?php

/**
 * Функция выполняет поиск заголовка в массиве меню, если в массиве было совпадение с искомым url возвращает соотв-й заголовок иначе первый заголовок массива
 * @param array $array принимает массив в которов будет выполнен поиск заголовка
 * @param string $key принимат строку в качестве ключа массива по которой будет осуществляться поиск заголовка
 * @return string возвращает строку
 */
function getTitle(array $array = [], string $key = 'title') : string
{
    $searchedUri = $_SERVER['REQUEST_URI'];

    foreach ($array as $value) {
        if ( array_search($searchedUri, $value) ) {
            return $value[$key];
        }
    }

    return $array[array_key_first($array)][$key];
}
