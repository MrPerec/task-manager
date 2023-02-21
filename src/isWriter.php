<?php

/**
 * Функция проверяет может ли пользовать писать сообщения или нет
 * @return bool возвращает true или false
 */

function isWriter() : bool
{
    foreach ($_SESSION['userGroup'] as $group) {
        if ($group['group'] == 'Writer') return true;
    }

    return false;
}
