<?php

namespace showMessage;

/**
 * Функция для отображения сообщения о статусе загрузки файла
 * @param string $message - принимает строку - текст который будет отображен в сообщении
 * @param bool $success - принимает true или false - статус сообщения успешное или ошибка соответственно, по умолчанию true
 * @return вёрстка - сообщения о статусе загрузки
 */

function showMessage(string $message, bool $success = true)
{
    ?><div class="<?=$success ? 'text_success' : 'text_error'?>"><?=$message?></div><?php
}