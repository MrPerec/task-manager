<?php

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
// var_dump($_POST);

/* $hash = password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
var_dump($hash);
var_dump(password_verify('rasmuslerdorf', $hash)); */

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password_confirm'])) {
    if (strlen($_POST['password']) >= MIN_PASS_LENGTH && strlen($_POST['password_confirm']) >= MIN_PASS_LENGTH) {
        if (!strcmp($_POST['password'], $_POST['password_confirm'])) {
            connect()->prepare("INSERT INTO `home_work_20`.`users`(surname, name, middle_name, login) VALUES (:surname, :name, :middle_name, :login)")
                    ->execute([
                        ':surname' => $_POST['surname'],
                        ':name' => $_POST['name'],
                        ':middle_name' => $_POST['middle_name'],
                        ':login' => $_POST['login'], 
                    ]);

            $lastUserId = connect()->lastInsertId();
            $hashUserPasswd = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // connect()->prepare("INSERT INTO `home_work_20`.`passwords`(password, user_id) VALUES (:password, :user_id)")
            //         ->execute([
            //             ':password' => $hashUserPasswd,
            //             ':user_id' => $lastUserId, 
            //         ]);
            connect()->prepare("INSERT INTO `home_work_20`.`passwords`(password, user_id) VALUES (?, ?)")
                    ->execute([
                        $hashUserPasswd,
                        $lastUserId, 
                    ]);

            $lastUserId = null;

            include_once $serverRootPath . REG_SUCC_MSG;
        } else {
            include_once $serverRootPath . REG_PASS_MATCH_ERR_MSG;
        }
    } else {
        include_once $serverRootPath . REG_PASS_LENGTH_ERR_MSG;
    }
}


//простой запрос
// $stmt = connect()->query("SELECT * FROM `home_work_20`.`users` 
//                                 LEFT JOIN passwords ON users.id = passwords.user_id;");

// // var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
// while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     var_dump("$row[surname] $row[name] $row[middle_name] $row[login] $row[password]");
// }

//Пример использования подготовленных запросов в PHP PDO:
// $stmt = connect()->prepare("SELECT * FROM `home_work_20`.`users` LEFT JOIN passwords ON users.id = :id");
// $id = 'passwords.user_id';
// $stmt->execute([':id' => 'passwords.user_id']);
//или короче
// $stmt = connect()->prepare("SELECT * FROM `home_work_20`.`users` LEFT JOIN passwords ON users.id = ?");
// $id = 'passwords.user_id';
// $stmt->execute([$id]);

// var_dump($stmt->fetchAll(PDO::FETCH_OBJ));


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
