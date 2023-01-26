<?php

require_once ($serverRootPath . CORE);

session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $stmt = connect()->prepare("SELECT users.id, users.login, passwords.password 
                                FROM `home_work_20`.`users` AS users 
                                    INNER JOIN `home_work_20`.`passwords` AS passwords ON users.id = passwords.user_id
                                        WHERE users.login = ?");
    $stmt->execute([$_POST['login']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // if ($result && password_verify($_POST['password'], $result['password'])) $_SESSION['isAuthorized'] = true; 
    if ($result && password_verify($_POST['password'], $result['password'])){
        $_SESSION['isAuthorized'] = true; 
        $_SESSION['id'] = $result['id']; 
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

var_dump($_POST);
var_dump($_GET);
var_dump($_SESSION);
var_dump($_COOKIE);

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

    <?php \showMenu\showMenu($leftBarMenu, 'sort', true); ?>

