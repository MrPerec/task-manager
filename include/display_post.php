<?php

$messageId = $_GET['id'];

$selectGetMessageData = "select msgs.id, 
                          CONCAT(usrs.surname, ' ', usrs.name, ' ', usrs.middle_name) as `from`, 
                              sctns.section, 
                              title, 
                              message, 
                              is_read 
                          from `home_work_20`.`messages` msgs
                          join `home_work_20`.`users` usrs on usrs.id = msgs.sender_user_id
                          join `home_work_20`.`sections` sctns on sctns.id = msgs.section_id
                          where msgs.id = ?";

$messageData = sendQueryDB($selectGetMessageData, [$messageId])['responseData'];

if (!(int) $messageData[0]['is_read']) {
  $updateIsReadStatus = "UPDATE `home_work_20`.`messages` SET is_read = 1 WHERE id = ?";
  sendQueryDB($updateIsReadStatus, [$messageId]);
}

?>
<div><b>От кого:</b> <?=$messageData[0]['from']?></div>
<div><b>Раздел:</b> <?=$messageData[0]['section']?></div>
<div><b>Тема письма:</b> <?=$messageData[0]['title']?></div>
<div><b>Содержание:</b> <?=$messageData[0]['message']?></div>
</td>
