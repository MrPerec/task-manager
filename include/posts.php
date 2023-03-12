<?php if (isWriter()) {

$userId = $_SESSION['userId'];

$selectGetMessages = "select  msgs.id, 
                              sctns.section, 
                              title, 
                              is_read as `isRead`
                      from `home_work_20`.`messages` msgs
                      join `home_work_20`.`sections` sctns on sctns.id = msgs.section_id
                      where receiver_user_id = ?";

$messagesData = sendQueryDB($selectGetMessages, [$userId])['responseData'];

$readMessages = [];
$unreadMessages = [];

foreach ($messagesData as $messageData) {
  if ($messageData['isRead']) {
    $readMessages[] = $messageData;
  } else {
    $unreadMessages[] = $messageData;
  }
}

  ?>
  <p><a class='message-link_cursor-pointer' href=<?=URI_ADD_POSTS?>>Написать сообщение</a></p>
  <div class='flex-box'>
    <li><b class='text-color-red'>Непрочитанные</b>
      <?php
        foreach ($unreadMessages as $message) {
          $messageUri = URI_DISPLAY_POST . '?id=' . $message['id'];
          ?>
          <ul><a class='message-link_cursor-pointer' href=<?=$messageUri?>><?=cutString($message['title'])?> <b><?=$message['section']?></b></a></ul>
          <?
        }
      ?>
    </li>
    
    <li><b class='text-color-green'>Прочитанные</b>
      <?php
        foreach ($readMessages as $message) {
          $messageUri = URI_DISPLAY_POST . '?id=' . $message['id'];
          ?>
          <ul><a class='message-link_cursor-pointer' href=<?=$messageUri?>><?=cutString($message['title'])?> <b><?=$message['section']?></b></a></ul>
          <?
        }
      ?>
    </li>
  </div>
  <?
} else {
  ?><p>Вы сможете отправлять сообщения после прохождения модерации</p><?
}?>

</td>
