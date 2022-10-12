<?php

var_dump($_GET);
var_dump($_POST);

?>

<div class="index-auth">
    <form action="?login=yes" method="post">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td class="iat">
                    <label for="login_id">Ваш e-mail:</label>
                    <input id="login_id" size="30" name="login" value="<?=$isAuthorized ? '' : htmlspecialchars($_POST['login'] ?? '')?>">
                </td>
            </tr>
            <tr>
                <td class="iat">
                    <label for="password_id">Ваш пароль:</label>
                    <input id="password_id" size="30" name="password" type="password" value="<?=$isAuthorized ? '' : htmlspecialchars($_POST['password'] ?? '')?>">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Войти"></td>
            </tr>
        </table>
    </form>
    <?php if (!empty($_POST)) {
        if ($isAuthorized) {
            include_once $_SERVER['DOCUMENT_ROOT'] . SUCC_MSG;
        } else {
            include_once $_SERVER['DOCUMENT_ROOT'] . ERR_MSG;
        }
    }?>
</div>