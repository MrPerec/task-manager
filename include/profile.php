<p><b>Ф. И. О.:</b> <?=$_SESSION['userName']['surname']?> <?=$_SESSION['userName']['name']?> <?=$_SESSION['userName']['middle_name']?></p>
<p><b>Почтовый адрес:</b> <?=$_SESSION['userName']['email']?></p>
<li>
  <b>Контактный номер телефона:</b>
  <?php
    foreach ($_SESSION['userPhone'] as $phone) {?>
      <ol><?=$phone['phone']?></ol>
    <?}
  ?>
</li>
<li>
  <b>Группы:</b>
  <?php
    foreach ($_SESSION['userGroup'] as $group) {?>
      <ol><?=$group['group']?></ol>
    <?}
  ?>
</li>
</td>
