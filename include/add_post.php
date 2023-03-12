<?php

$senderUser = $_SESSION['userId'];

$selectGetUsersWritersData = "select usrs.id, CONCAT(surname, ' ', name, ' ', middle_name) as `users_writers` from `home_work_20`.`users` usrs
                        JOIN `home_work_20`.`users_groups` usrsgrps ON usrs.id = usrsgrps.user_id 
                        JOIN `home_work_20`.`groups` grps ON usrsgrps.group_id = grps.id
                        where grps.group = 'writer'
                        and usrs.id != ?
                        order by 1";

$selectSectionsData = "SELECT * FROM home_work_20.sections";

$usersWritersData = sendQueryDB($selectGetUsersWritersData, [$senderUser])['responseData'];
$sectionsData = sendQueryDB($selectSectionsData)['responseData'];

if (isset($_POST['title_text']) && isset($_POST['body_text']) && isset($_POST['receiver_user']) && isset($_POST['message_section'])) {
  $insertMessageData = "insert into `home_work_20`.`messages` (sender_user_id, receiver_user_id, section_id, title, message) values (?, ?, ?, ?, ?)";
  
  $receiverUser = (int) $_POST['receiver_user'];
  $messageSection = (int) $_POST['message_section'];
  $titleText = (string) $_POST['title_text'];
  $bodyText = (string) $_POST['body_text'];
  
  sendQueryDB($insertMessageData, [$senderUser, $receiverUser, $messageSection, $titleText, $bodyText]);
}

?>

<form action="<?=$uri?>" name="add_post" method="post">
  <table width="100%" cellspacing="0" cellpadding="0">
    <tr>
      <td class="iat">
          <label for="title_text">Заголовок:</label>
          <input required class="post_container" size="30" type="text" name="title_text">
      </td>
    </tr>
    <tr>
      <td class="iat">
          <label for="body_text">Текст сообщения:</label>
          <textarea required class="post_container post-textarea_container" name="body_text"></textarea>
      </td>
    </tr>
    <tr>
      <td class="iat">
          <label for="receiver_user">Пользователь:</label>
          <select name="receiver_user">
            <?php
              foreach ($usersWritersData as $userWriter) {
                $userWriterId = $userWriter['id'];
                $userWriterName = $userWriter['users_writers'];
                ?>
                <option value=<?=$userWriterId?>><?=$userWriterName?></option>
                <?
              }
            ?>
          </select>
      </td>
    </tr>
    <tr>
      <td class="iat">
          <label for="message_section">Раздел сообщения:</label>
          <select name="message_section">
          <?php
              foreach ($sectionsData as $section) {
                $sectionId = $section['id'];
                $sectionName = $section['section'];
                ?>
                <option value=<?=$sectionId?>><?=$sectionName?></option>
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
