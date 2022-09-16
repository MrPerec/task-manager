<?php

var_dump($_POST);
var_dump($_FILES);

if (isset($_POST['upload']))
{
  $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

  if (!empty($_FILES['pictures']['error'])) 
  {
    echo 'Ошибка загрузки';
  } else {
    move_uploaded_file($_FILES['pictures']['tmp_name'], $uploadPath . $_FILES['pictures']['name']);
  }
} 

?>

<p>
  <form enctype="multipart/form-data" method="POST" action="<?=$uri?>">
    <input type="file" name="pictures" required multiple title="Загрузите одну или несколько фотографий" />
    <br/>
    <p>
      <input type="submit" name="upload" value="Загрузить" />
    </p>
  </form>
</p>
</td>

