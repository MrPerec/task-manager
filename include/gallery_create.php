<?php

$filePicturesArr = $_SERVER['DOCUMENT_ROOT'] . '/src/pictures.txt';

if (isset($_POST['upload']))
{
  $totalFiles = count($_FILES['userPictures']['name']);

  if ($totalFiles > 0 && $totalFiles < 6) {
    $uploadDirPath = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR;
    $maxLimitSize = 5 * 1024 * 1024;

    for($key = 0; $key < $totalFiles; $key++) {
      $originFileName = $_FILES['userPictures']['name'][$key];
      $fileName = pathinfo($originFileName, PATHINFO_FILENAME);
      $fileExtension = strtolower(pathinfo($originFileName, PATHINFO_EXTENSION));
      
      if (!empty($_FILES['userPictures']['error'][$key])){
        echo "Ошибка загрузки файла '$fileName'\n";
      } elseIf (!in_array( $fileExtension, EXTENSIONS_ARR)){
        echo "Ошибка типа файла '$originFileName'\n";
      } elseIf ($_FILES['userPictures']['size'][$key] > $maxLimitSize){
        echo "Ошибка размера файла '$originFileName'\n";
      } else {
        // $now = date('d-m-Y_H-i-s');
        $changedFileName = preg_replace('/[^a-zA-Zа-яёА-ЯЁ0-9_\-]/u', '_', $fileName) . '.' . $fileExtension;
        
        //вариант при загрузке изображения сразу писать о нем в отдельный файл

//         if (is_writable($filePicturesArr)) {
//           file_put_contents($filePicturesArr,  
// "[
//   'dateLoad' => $now,
//   'name' => $changedFileName,
//   'img' => /upload/$changedFileName,
// ]," . PHP_EOL, 
//           FILE_APPEND);
//         }
          
        move_uploaded_file($_FILES['userPictures']['tmp_name'][$key], $uploadDirPath . $changedFileName);
        echo "Файл '$originFileName' загружен. \n";
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
