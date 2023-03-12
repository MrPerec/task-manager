<?php

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password_confirm'])) {
    if (strlen($_POST['password']) >= MIN_PASS_LENGTH && strlen($_POST['password_confirm']) >= MIN_PASS_LENGTH) {
        if (!strcmp($_POST['password'], $_POST['password_confirm'])) {
            
            $insertUserQuery = 'INSERT INTO `home_work_20`.`users`(surname, name, middle_name, login) VALUES (?, ?, ?, ?)';
            $userDataParam = [$_POST['surname'], $_POST['name'], $_POST['middle_name'], $_POST['login']];

            $lastUserId = sendQueryDB($insertUserQuery, $userDataParam)['lastInsertId'];
            $hashUserPasswd = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $insertPasswordQuery = 'INSERT INTO `home_work_20`.`passwords`(password, user_id) VALUES (?, ?)';
            sendQueryDB($insertPasswordQuery, [$hashUserPasswd, $lastUserId]);

            $lastUserId = null;
            include_once $serverRootPath . REG_SUCC_MSG;
        } else {
            include_once $serverRootPath . REG_PASS_MATCH_ERR_MSG;
        }
    } else {
        include_once $serverRootPath . REG_PASS_LENGTH_ERR_MSG;
    }
}

?>

<div class="index-auth">
    <h3>Для регистрации на сайте заполните поля</h3>
    <form action="?register=yes" name="register" method="post">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td class="iat">
                    <label for="reg_surname_id">Фамилия:</label>
                    <input id="reg_surname_id" size="30" name="surname" value="<?=htmlspecialchars($_POST['surname'] ?? '')?>">
                </td>
                <td class="iat">
                    <label for="reg_name_id">Имя:</label>
                    <input id="reg_name_id" size="30" name="name" value="<?=htmlspecialchars($_POST['name'] ?? '')?>">
                </td>
                <td class="iat">
                    <label for="reg_middle_name_id">Отчество:</label>
                    <input id="reg_middle_name_id" size="30" name="middle_name" value="<?=htmlspecialchars($_POST['middle_name'] ?? '')?>">
                </td>
            </tr>
            <tr>
                <td class="iat">
                    <label for="reg_login_id">Ваш логин*:</label>
                    <input id="reg_login_id" size="30" name="login" required value="<?=htmlspecialchars($_POST['login'] ?? '')?>">
                </td>
            </tr>
            <tr>
                <td class="iat">
                    <label for="reg_password_id">Ваш пароль*:</label>
                    <input id="reg_password_id" size="30" name="password" type="password" required value="<?=htmlspecialchars('')?>">
                </td>
                <td class="iat">
                    <label for="reg_confirm_password_id">Подтверждение пароля*:</label>
                    <input id="reg_confirm_password_id" size="30" name="password_confirm" type="password" required value="<?=htmlspecialchars('')?>">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Зарегистрироваться"></td>
            </tr>
        </table>
    </form>
</div>
