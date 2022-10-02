<?php

$filePicturesArr = $_SERVER['DOCUMENT_ROOT'] . '/src/pictures.txt';

if (isset($_POST['upload'])) {
  $uploadDirPath = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR;
  $uploadResultStr = "";        

  if (is_writable($uploadDirPath)) {
    $totalFiles = count($_FILES['userPictures']['name']);

    if ($totalFiles > 0 && $totalFiles < 6) {
      $maxLimitSize = 5 * 1024 * 1024;

      for($key = 0; $key < $totalFiles; $key++) {
        $originFileName = $_FILES['userPictures']['name'][$key];
        $fileName = pathinfo($originFileName, PATHINFO_FILENAME);
        $fileExtension = strtolower(pathinfo($originFileName, PATHINFO_EXTENSION));
        
        if (!empty($_FILES['userPictures']['error'][$key])){
          $uploadResultStr = "$uploadResultStr Ошибка загрузки файла '$originFileName'. <br />";
        } elseIf (!in_array( $fileExtension, EXTENSIONS_ARR)){
          $uploadResultStr = "$uploadResultStr Ошибка типа файла '$originFileName'. <br />";
        } elseIf ($_FILES['userPictures']['size'][$key] > $maxLimitSize){
          $uploadResultStr = "$uploadResultStr Ошибка размера файла '$originFileName'. <br />";
        } else {
          $changedFileName = preg_replace('/[^a-zA-Zа-яёА-ЯЁ0-9_\-]/u', '_', $fileName) . '.' . $fileExtension;

          move_uploaded_file($_FILES['userPictures']['tmp_name'][$key], $uploadDirPath . $changedFileName);
          $uploadResultStr = "$uploadResultStr Файл '$originFileName' загружен. <br />";
        }
      }
    } else {
      echo 'Одновременно можно загрузить от одного до пяти изображений.';
    }
  } else {
    $uploadResultStr = "Ошибка директории $uploadDirPath";
  }

  echo $uploadResultStr;
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
