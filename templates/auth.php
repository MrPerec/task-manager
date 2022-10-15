<?php

$serverRootPath = $_SERVER['DOCUMENT_ROOT'];
$isLoginTry = isset($_POST['login']) && isset($_POST['password']);
$inputLoginValue = '';
$inputPassValue = '';

if ($isLoginTry) {
    include_once $serverRootPath . USERS;
    include_once $serverRootPath . PASSWORDS;
    
    $loginMessage = '';

    if ((in_array($_POST['login'], $users) && in_array($_POST['password'], $passwords)) && (array_flip($users)[$_POST['login']] == array_flip($passwords)[$_POST['password']])) {
        $_SESSION['isAuthorized'] = true;
        $loginMessage = $serverRootPath . SUCC_MSG;
    } else {
        $_SESSION['isAuthorized'] = false;
        $inputLoginValue = $_POST['login'];
        $inputPassValue = $_POST['password'];
        $loginMessage = $serverRootPath . ERR_MSG;
    }

    include_once $loginMessage;
}

if (isset($_GET['login'])) {?>
    <div class="index-auth">
        <form action="?login=yes" method="post">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="iat">
                        <label for="login_id">Ваш e-mail:</label>
                        <input id="login_id" size="30" name="login" value="<?=htmlspecialchars($inputLoginValue)?>">
                    </td>
                </tr>
                <tr>
                    <td class="iat">
                        <label for="password_id">Ваш пароль:</label>
                        <input id="password_id" size="30" name="password" type="password" value="<?=htmlspecialchars($inputPassValue)?>">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Войти"></td>
                </tr>
            </table>
        </form>
    </div>
<? } ?>