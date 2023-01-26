<?php

// connect()->prepare("INSERT INTO `home_work_20`.`users`(surname, name, middle_name, login) VALUES (?, ?, ?, ?)")
//         ->execute([$_POST['surname'], $_POST['name'], $_POST['middle_name'], $_POST['login']]);

// $lastUserId = connect()->lastInsertId();
// $hashUserPasswd = password_hash($_POST['password'], PASSWORD_DEFAULT);

// connect()->prepare("INSERT INTO `home_work_20`.`passwords`(password, user_id) VALUES (?, ?)")
//         ->execute([$hashUserPasswd, $lastUserId]);

// $lastUserId = null;

echo('Делаю какой-то запрос к БД...');

?>

<p>Эта страица отображает информацию о <b>пользователе</b></p>
<li>
  Отображаемая информация
  <ol>Ф. И. О.</ol>
  <ol>email</ol>
  <ol>телефон текущего авторизованного пользователя в виде списка</ol>
  <ol>названия всех групп, к которым он привязан</ol>
</li>
</td>