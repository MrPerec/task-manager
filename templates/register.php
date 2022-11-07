<?php

if (isset($_GET['register'])) {
    connect();

    /* try {
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        $dbh->beginTransaction();
        $dbh->exec("insert into staff (id, first, last) values (23, 'Joe', 'Bloggs')");
        $dbh->exec("insert into salarychange (id, amount, changedate)
            values (23, 50000, NOW())");
        $dbh->commit();
      
      } catch (Exception $e) {
        $dbh->rollBack();
        echo "Ошибка: " . $e->getMessage();
      } */
}

// добавить сравнение полей пароль и подтверждения
//пароль должен быть не менее 6 знаков
define("MIN_PASS_LENGTH", 6);

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password_confirm'])) {
    if (strlen($_POST['password']) >= MIN_PASS_LENGTH && strlen($_POST['password_confirm']) >= MIN_PASS_LENGTH) {
        if (!strcmp($_POST['password'], $_POST['password_confirm'])) {
            echo 'Пароли совпадают.';
            // $dbh 
            //     -> prepare("SELECT users.surname as 'Фамилия', users.name 'Имя', 
            //                         users.middle_name as 'Отчество', 
            //                         users.login as 'Логин', 
            //                         passwords.password as 'Пароль'
            //                             FROM `home_work_20`.`users`
            //                                 LEFT JOIN passwords ON users.id = passwords.user_id;") 
            //     -> execute();

                
        } else {
            echo 'Пароли не совпадают.';
        }
    } else {
        echo 'Длина пароля должна быть минимум 6 знаков.';
    }
}

?>

<div class="index-auth">
    <h3>Для регистрации на сайте заполните поля</h3>
    <form action="?register=yes" name="test" method="post">
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
                    <label for="reg_confirm_password_id">Подтверждение пароля*:</label>
                    <input id="reg_confirm_password_id" size="30" name="password_confirm" type="password" required value="">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Зарегистрироваться"></td>
            </tr>
        </table>
    </form>
</div>
