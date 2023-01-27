<?php
$userId = $_SESSION['id'];

$selectGetUserData = 'SELECT surname, `name`, middle_name, email
                      from `home_work_20`.`users` users
                      where users.id = ?';

$selectGetUserPhone = 'SELECT phone from `home_work_20`.`phones` phones where user_id = ?';

$selectGetUserGroup = 'SELECT `group` from `home_work_20`.`groups` grps
                        JOIN `home_work_20`.`users_groups` usrgrs ON usrgrs.group_id = grps.id 
                        where usrgrs.user_id = ?';

$userData = getData($selectGetUserData, $userId);
$userData = $userData[array_key_first($userData)];

$userPhone = getData($selectGetUserPhone, $userId);
$userGroup = getData($selectGetUserGroup, $userId);

?>

<h4>Общая информация пользователя:</h4>
<p><b>Ф. И. О.:</b> <?=$userData['surname']?> <?=$userData['name']?> <?=$userData['middle_name']?></p>
<p><b>Почтовый адрес:</b> <?=$userData['email']?></p>
<li>
  <b>Контактный номер телефона:</b>
  <?php
    foreach ($userPhone as $phone) {?>
      <ol><?=$phone['phone']?></ol>
    <?}
  ?>
</li>
<li>
  <b>Группы:</b>
  <?php
    foreach ($userGroup as $group) {?>
      <ol><?=$group['group']?></ol>
    <?}
  ?>
</li>
</td>
