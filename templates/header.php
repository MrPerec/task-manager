<?php

require_once ($serverRootPath . CORE);

var_dump($_GET);
var_dump($_POST);

session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $selectGetUserAuthData = "SELECT users.id, users.login, passwords.password 
                            FROM `home_work_20`.`users` AS users 
                            INNER JOIN `home_work_20`.`passwords` AS passwords ON users.id = passwords.user_id
                            WHERE users.login = ?";

    $userAuthData = sendQueryDB($selectGetUserAuthData, [$_POST['login']])['responseData'];
    
    if ($userAuthData) {
        $userAuth = $userAuthData[array_key_first($userAuthData)];
        $userAuthPasswd = $userAuth['password'];
        $userAuthId = $userAuth['id'];

        if (password_verify($_POST['password'], $userAuthPasswd)) {
            $_SESSION['isAuthorized'] = true; 

            $selectGetUserNameData = "SELECT CONCAT(surname, ' ', name, ' ', middle_name) as `name`, email
                                        from `home_work_20`.`users` users
                                        where users.id = ?";

            $selectGetUserPhoneData = 'SELECT phone from `home_work_20`.`phones` phones where user_id = ?';

            $selectGetUserGroupData = 'SELECT `group` from `home_work_20`.`groups` grps
                                        JOIN `home_work_20`.`users_groups` usrgrs ON usrgrs.group_id = grps.id 
                                        where usrgrs.user_id = ?';

            $userNameData = sendQueryDB($selectGetUserNameData, [$userAuthId])['responseData'];
            $userName = $userNameData[array_key_first($userNameData)];

            $_SESSION['userId'] = $userAuthId;
            $_SESSION['userName'] = $userName;
            $_SESSION['userPhone'] = sendQueryDB($selectGetUserPhoneData, [$userAuthId])['responseData'];
            $_SESSION['userGroup'] = sendQueryDB($selectGetUserGroupData, [$userAuthId])['responseData'];
        }
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

    <?php \showMenu\showMenu($leftBarMenu, 'sort', true); ?>

