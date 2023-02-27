<?php

$selectGetUsersList = "SELECT CONCAT(surname, ' ', name, ' ', middle_name) as `user` 
                      FROM `home_work_20`.`users` 
                      where surname != ''";

// $usersListData = getData($selectGetUsersList, '');

// var_dump($usersListData);

$stmt = connect()->prepare($selectGetUsersList);
$stmt->execute([null]);

// $pdo = new PDO();
// $pdo 
// -> connect()-> prepare($selectGetUsersList) 
// -> execute();
foreach ($stmt as $row) {
  var_dump($row);
}
?>

<form action="?add_post=yes" name="add_post" method="post">
  <table width="100%" cellspacing="0" cellpadding="0">
    <tr>
      <td class="iat">
          <label for="text_title">Заголовок:</label>
          <input required class="post_container" size="30" name="text_title" value="">
      </td>
    </tr>
    <tr>
      <td class="iat">
          <label for="text_body">Текст сообщения:</label>
          <textarea required class="post_container post-textarea_container" name="text_body" value=""></textarea>
      </td>
    </tr>
    <tr>
      <td class="iat">
          <label for="to_user">Пользователь:</label>
          <select name="to_user" value="">
            <option disabled>Выберите пользователя</option>
            <option selected value="Пользователь1">Пользователь1</option>
            <option value="Пользователь2">Пользователь2</option>
            <option value="Пользователь3">Пользователь3</option>
            <option value="Пользователь4">Пользователь4</option>
          </select>
      </td>
    </tr>
    <tr>
      <td class="iat">
          <label for="message_section">Раздел сообщения:</label>
          <select name="message_section" value="">
            <option disabled>Выберите раздел</option>
            <option selected value="Раздел1">Раздел1</option>
            <option value="Раздел2">Раздел2</option>
            <option value="Раздел3">Раздел3</option>
            <option value="Раздел4">Раздел4</option>
          </select>
      </td>
    </tr>
    <tr>
        <td><input type="submit" value="Отправить"></td>
    </tr>
  </table>
</form>
</td>
