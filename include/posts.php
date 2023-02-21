<?php if (isWriter()) {
  ?>
  <p><a class='message-link_cursor-pointer' href=<?=URI_ADD_POSTS?>>Написать сообщение</a></p>
  <div class='flex-box'>
    <li><b class='text-color-red'>Непрочитанные</b>
      <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 1</a></ul>
      <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 2</a></ul>
      <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 3</a></ul>
    </li>
    
    <li><b class='text-color-green'>Прочитанные</b>
      <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 1</a></ul>
      <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 2</a></ul>
      <ul><a class='message-link_cursor-pointer'>Заголовок сообщения и название раздела 3</a></ul>
    </li>
  </div>
  <?
} else {
  ?><p>Вы сможете отправлять сообщения после прохождения модерации</p><?
}?>

</td>
