<?php

$isWriter = false;

foreach ($_SESSION['userGroup'] as $group) {
 if ($group['group'] == 'Writer') $isWriter = true;
}

?>

<?php if ($isWriter) {
  ?>
  <p><a class='message-link_cursor-pointer' href=<?=URI_ADD_POSTS?>>Написать сообщение</a></p>
  <li><b>Непрочитанные</b>
    <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 1</a></ul>
    <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 2</a></ul>
    <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 3</a></ul>
  </li>
  
  <li><b>Прочитанные</b>
    <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 1</a></ul>
    <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 2</a></ul>
    <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 3</a></ul>
  </li>

  <?
} else {
  ?><p>Вы сможете отправлять сообщения после прохождения модерации</p><?
}?>

</td>
