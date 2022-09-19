<?php

var_dump($_FILES);

if (isset($_POST['upload']))
{
  $uploadPath = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_FOLDER;

  if (empty($_FILES[USER_PICTURES]['error']) && $_FILES[USER_PICTURES]['size'] <= TW0_MB && $_FILES[USER_PICTURES]['type'] == TYPE_PNG || $_FILES[USER_PICTURES]['type'] == TYPE_JPEG) 
  {
    move_uploaded_file($_FILES[USER_PICTURES]['tmp_name'], $uploadPath . $_FILES[USER_PICTURES]['name']);
  } else {
    echo 'Ошибка загрузки';
  }
} 

?>

<p>
  <form enctype="multipart/form-data" method="POST" action="<?=$uri?>">
    <input type="file" name="userPictures[]" required multiple title="Загрузите одну или несколько фотографий" />
    <br/>
    <p>
      <input type="submit" name="upload" value="Загрузить" />
    </p>
  </form>
</p>
</td>

