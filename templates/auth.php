<div class="index-auth">
    <form action="?login=yes" method="post">
        <table width="100%" cellspacing="0" cellpadding="0">

            <?php if (!isLogin()) { ?>
                <tr>
                    <td class="iat">
                        <label for="login_id">Ваш login*:</label>
                        <input id="login_id" size="30" name="login" required value="<?=htmlspecialchars(islogin() ? '' : ($_POST['login'] ?? ($_COOKIE['user'] ?? '')))?>">
                    </td>
                </tr>
            <? } ?>
            
            <tr>
                <td class="iat">
                    <label for="password_id">Ваш пароль*:</label>
                    <input id="password_id" size="30" name="password" type="password" required value="<?=htmlspecialchars(islogin() ? '' : $_POST['password'] ?? '')?>">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Войти"></td>
            </tr>
        </table>
    </form>
    <?php if (!empty($_POST)) isLogin() ? include_once $serverRootPath . SUCC_MSG : include_once $serverRootPath . ERR_MSG; ?>
</div>
