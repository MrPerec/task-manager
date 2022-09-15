<?php

/**
 * Функция возвращает обрезанную строку если та больше 12ти символов дополняя её троеточием
 * @param string $line принимаемая строка
 * @param int $length указывается число, если длина строки больше этого числа то последние символы будут обрезаны
 * @param string $appends симолы которые будут подставлены в конце строки если ее длина больше указанной
 * @return string возвращает обрезанную строку
 */
function cutString(string $line, int $length = 12, string $appends = '...') : string
{
    if (mb_strlen($line) > $length) {
        return mb_substr($line, 0, $length) . $appends;
    }
    return $line;
}
