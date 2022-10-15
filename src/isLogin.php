<?php

/**
 * Функция проверяет авторизован пользовать или нет
 * @return bool возвращает true или false
 */

function isLogin() : bool
{
    return isset($_SESSION['isAuthorized']);
}
