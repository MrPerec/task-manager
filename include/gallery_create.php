<?php

if (isset($_POST['upload'])) {
  $uploadDirPath = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR;

  if (is_writable($uploadDirPath)) {
    $totalFiles = count($_FILES['userPictures']['name']);

    if ($totalFiles > 0 && $totalFiles < 6) {
      for($key = 0; $key < $totalFiles; $key++) {
        $originFileName = $_FILES['userPictures']['name'][$key];
        $fileName = pathinfo($originFileName, PATHINFO_FILENAME);
        $fileExtension = strtolower(pathinfo($originFileName, PATHINFO_EXTENSION));

        if (!empty($_FILES['userPictures']['error'][$key]) || !in_array( $fileExtension, EXTENSIONS_ARR) || $_FILES['userPictures']['size'][$key] > maxLimitSize){
          \showMessage\showMessage("Ошибка загрузки файла '$originFileName'.", false);
        } else {
          $changedFileName = preg_replace('/[^a-zA-Zа-яёА-ЯЁ0-9_\-]/u', '_', $fileName) . '.' . $fileExtension;

          move_uploaded_file($_FILES['userPictures']['tmp_name'][$key], $uploadDirPath . $changedFileName);
          \showMessage\showMessage("Файл '$originFileName' загружен.", true);
        }
      }
    } else {
      \showMessage\showMessage("Одновременно можно загрузить от одного до пяти изображений.", false);
    }
  } else {
    \showMessage\showMessage("Ошибка директории '$uploadDirPath'", false);
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
