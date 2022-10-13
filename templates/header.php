<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . CORE);

$isAuthorized = false;

// var_dump($_POST);

// if (isset($_POST) && $isAuthorized) {
//     session_start();
// }

if (isset($_POST['login']) && isset($_POST['password'])) {
    include_once $_SERVER['DOCUMENT_ROOT'] . USERS;
    include_once $_SERVER['DOCUMENT_ROOT'] . PASSWORDS;

    if ((in_array($_POST['login'], $users) && in_array($_POST['password'], $passwords)) && (array_flip($users)[$_POST['login']] == array_flip($passwords)[$_POST['password']])) {
        session_start();
        $_SESSION['login'] = true;
        
        $isAuthorized = true;
    }
}
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

    <?=\showMenu\showMenu($menuArray, 'sort', true)?>

