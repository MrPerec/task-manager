<?php

require_once ($serverRootPath . CORE);

session_start();
var_dump($_SESSION);

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
</head>
<body>
    <div class="header">
        <div class="logo"><img src="/img/logo.png" alt="Project"></div>
        <div class="author">Автор: <span class="author__name">Макшанов Илья</span></div>
    </div>

    <?php
    if (isset($_SESSION['isAuthorized'])) {
        \showMenu\showMenu($mainMenu, 'sort', true);
    } else {?>
        <div class="clear">
            <ul class="main-menu">
                <li><a class="link_font-size-16 link_text-decoration" href="/">Главная</a></li>
            </ul>
        </div>
    <?}?>

