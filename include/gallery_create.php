<?php

if (isset($_POST['upload']))
{
  $totalFiles = count($_FILES['userPictures']['name']);

  if ($totalFiles > 0 && $totalFiles < 6) {
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_FOLDER;
    $maxLimitSize = 5 * 1024 * 1024;

    for($key = 0; $key < $totalFiles; $key++) {
      $fileName = $_FILES['userPictures']['name'][$key];
      var_dump($fileName);

      if (!empty($_FILES['userPictures']['error'][$key])){
        echo "Ошибка загрузки файла '$fileName'\n";
      } elseIf ($_FILES['userPictures']['size'][$key] > $maxLimitSize){
        echo "Ошибка размера файла '$fileName'\n";
      } elseIf (!($_FILES['userPictures']['type'][$key] == TYPE_PNG || $_FILES['userPictures']['type'][$key] == TYPE_JPEG)){
        echo "Ошибка типа файла '$fileName'\n";
      } else {
        move_uploaded_file($_FILES['userPictures']['tmp_name'][$key], $uploadPath . $fileName);
      }
    }
  } else {
    echo 'Одновременно можно загрузить от одного до пяти изображений.';
  }
} 

?>

<p>
  <form enctype="multipart/form-data" method="POST" action="<?=$uri?>">
    <input type="file" name="userPictures[]" multiple title="Загрузите одну или несколько фотографий" />
    <br/>
    <p>
      <input type="submit" name="upload" value="Загрузить" />
    </p>
  </form>
</p>
</td>

