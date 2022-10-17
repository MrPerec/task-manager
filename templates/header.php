<?php

require_once ($serverRootPath . CORE);

session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    include_once $serverRootPath . USERS;
    include_once $serverRootPath . PASSWORDS;

    if ((in_array($_POST['login'], $users) && in_array($_POST['password'], $passwords)) && (array_flip($users)[$_POST['login']] == array_flip($passwords)[$_POST['password']])) {
        $_SESSION['isAuthorized'] = true;
    } 
}

if (islogin()) {
    $arr_cookie_options = [
        'expires' => time() + 60*60*24*30,
        'path' => '/',
    ];

    if (isset($_POST['login'])) {
        setcookie('user', $_POST['login'], $arr_cookie_options);
    } else {
        setcookie('user', $_COOKIE['user'], $arr_cookie_options);
    }
} 

if (isset($_GET["logout"])) {
    unset($_SESSION['isAuthorized']);
    setcookie(session_name(), '', time() - 42000);
    session_destroy();
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
        <div class="project-folders-v-active"><a href="<?=islogin() ? '/?logout=yes' : '/?login=yes'?>"><?=islogin() ? 'Выйти' : 'Авторизоваться'?></a></div>
    </div>

    <?php \showMenu\showMenu($mainMenu, 'sort', true); ?>

