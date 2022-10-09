<?php

include_once ('constants.php');

if (isset($_FILES['pictures'])) {
  $uploadDir = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR;
  $result = []; 

  // if (is_writable($uploadDir)) {
    $totalFiles = count($_FILES['pictures']['name']);

    if ($totalFiles > 0 && $totalFiles < 6) {
      for($key = 0; $key < $totalFiles; $key++) {
        $originFileName = $_FILES['pictures']['name'][$key];
        $fileName = pathinfo($originFileName, PATHINFO_FILENAME);
        $fileExtension = strtolower(pathinfo($originFileName, PATHINFO_EXTENSION));

        if (!empty($_FILES['pictures']['error'][$key]) || !in_array( $fileExtension, EXTENSIONS_ARR) || $_FILES['pictures']['size'][$key] > maxLimitSize){
          $result[] = [
            'loaded' => false,
            'message' => "Upload error the file \"$originFileName\".",
            'fileName' => $originFileName,
          ];
        } else {
          $changedFileName = preg_replace('/[^a-zA-Zа-яёА-ЯЁ0-9_\-]/u', '_', $fileName) . '.' . $fileExtension;

          move_uploaded_file($_FILES['pictures']['tmp_name'][$key], $uploadDir . $changedFileName);
          $result[] = [
            'loaded' => true,
            'message' => "The file \"$originFileName\" has been upload.",
            'fileName' => $changedFileName,
            'filePath' => UPLOAD_DIR . $changedFileName
          ];
        }
      }
    } else {
      // $result[] = ['error' => 'Одновременно можно загрузить от одного до пяти изображений.'];
      $result[] = [
        'loaded' => false,
        'message' => 'You can upload from one to five images at a time.',
      ];
    }
  // } else {
  //   $result[] = ['error' => "Ошибка директории $uploadDir"];
  // }

  echo json_encode($result);
} 