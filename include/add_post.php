<?php

$selectGetUsersWritersData = "select CONCAT(surname, ' ', name, ' ', middle_name) as `users_writers` from `home_work_20`.`users` usrs
                        JOIN `home_work_20`.`users_groups` usrsgrps ON usrs.id = usrsgrps.user_id 
                        JOIN `home_work_20`.`groups` grps ON usrsgrps.group_id = grps.id
                        where grps.group = 'writer'
                        and usrs.id != ?
                        order by 1";

$selectSectionsData = "SELECT section FROM home_work_20.sections;";

$usersWritersData = getData($selectGetUsersWritersData, $_SESSION['userId']);
$sectionsData = getData($selectSectionsData);

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
          <label for="send_to">Пользователь:</label>
          <select name="send_to" value="">
            <?php
              foreach ($usersWritersData as $userWriter) {
                $userWriter = $userWriter['users_writers']
                ?>
                <option value=<?=$userWriter?>><?=$userWriter?></option>
                <?
              }
            ?>
          </select>
      </td>
    </tr>
    <tr>
      <td class="iat">
          <label for="message_section">Раздел сообщения:</label>
          <select name="message_section" value="">
          <?php
              foreach ($sectionsData as $section) {
                $section = $section['section']
                ?>
                <option value=<?=$section?>><?=$section?></option>
                <?
              }
            ?>
          </select>
      </td>
    </tr>
    <tr>
        <td><input type="submit" value="Отправить"></td>
    </tr>
  </table>
</form>
</td>
