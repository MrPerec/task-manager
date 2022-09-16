<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . CORE_PATH);

$isAuthorized = false;

// var_dump($_GET);
// var_dump($_POST);
// var_dump($_SERVER);

if (isset($_POST['login'])) {
    include_once $_SERVER['DOCUMENT_ROOT'] . USERS_PATH;
    include_once $_SERVER['DOCUMENT_ROOT'] . PASSWORDS_PATH;

    if ((in_array($_POST['login'], $users) && in_array($_POST['password'], $passwords)) && (array_flip($users)[$_POST['login']] == array_flip($passwords)[$_POST['password']])) {
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

