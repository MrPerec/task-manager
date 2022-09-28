<?php

// var_dump(preg_match('#[a-zA-Z]|[0-9]|\-|\_#', '.'));

if (isset($_POST['upload']))
{
  $totalFiles = count($_FILES['userPictures']['name']);

  if ($totalFiles > 0 && $totalFiles < 6) {
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_FOLDER;
    $maxLimitSize = 5 * 1024 * 1024;

    for($key = 0; $key < $totalFiles; $key++) {
      $originFileName = $_FILES['userPictures']['name'][$key];
      $fileName = pathinfo($originFileName, PATHINFO_FILENAME);
      $extension = strtolower(pathinfo($originFileName, PATHINFO_EXTENSION));
      
      if (!empty($_FILES['userPictures']['error'][$key])){
        echo "Ошибка загрузки файла '$fileName'\n";
      } elseIf (!(in_array( $extension, array('jpg', 'jpeg', 'png', 'gif', 'bmp')))){
        echo "Ошибка типа файла '$originFileName'\n";
      } elseIf ($_FILES['userPictures']['size'][$key] > $maxLimitSize){
        echo "Ошибка размера файла '$originFileName'\n";
      } else {
        // $now = date('d-m-Y_H-i-s');
        $changedFileName = preg_replace('/[^a-zA-Zа-яёА-ЯЁ0-9-_]/u', '_', $fileName) . '.' . $extension;

        move_uploaded_file($_FILES['userPictures']['tmp_name'][$key], $uploadPath . $changedFileName);
        echo "Файл '$originFileName' сохранён под именем '$changedFileName' \n";
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

