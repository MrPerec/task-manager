<?php

if (isset($_GET['register'])) {
    connect();
}

?>

<div class="index-auth">
    <h3>Для регистрации на сайте заполните поля</h3>
    <form action="?register=yes" method="post">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td class="iat">
                    <label for="reg_surname_id">Фамилия:</label>
                    <input id="reg_surname_id" size="30" name="surname" value="">
                </td>
                <td class="iat">
                    <label for="reg_name_id">Имя:</label>
                    <input id="reg_name_id" size="30" name="name" value="">
                </td>
                <td class="iat">
                    <label for="reg_middle_name_id">Отчество:</label>
                    <input id="reg_middle_name_id" size="30" name="middle_name" value="">
                </td>
            </tr>
            <tr>
                <td class="iat">
                    <label for="reg_login_id">Ваш логин*:</label>
                    <input id="reg_login_id" size="30" name="login" required value="">
                </td>
            </tr>
            <tr>
                <td class="iat">
                    <label for="reg_password_id">Ваш пароль*:</label>
                    <input id="reg_password_id" size="30" name="password" type="password" required value="">
                </td>
                <td class="iat">
                    <label for="reg_confirm_password_id">Поддтверждение пароля*:</label>
                    <input id="reg_confirm_password_id" size="30" name="password" type="password" required value="">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Зарегистрироваться"></td>
            </tr>
        </table>
    </form>
</div>
