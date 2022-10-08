<?php

include_once ('constants.php');
// include ('showMessage.php');

if (isset($_FILES['pictures'])) {
  $uploadDir = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR;
  $uploadResult = []; 
  // $uploadFiles = [];

  if (is_writable($uploadDir)) {
    $totalFiles = count($_FILES['pictures']['name']);

    if ($totalFiles > 0 && $totalFiles < 6) {
      for($key = 0; $key < $totalFiles; $key++) {
        $originFileName = $_FILES['pictures']['name'][$key];
        $fileName = pathinfo($originFileName, PATHINFO_FILENAME);
        $fileExtension = strtolower(pathinfo($originFileName, PATHINFO_EXTENSION));

        if (!empty($_FILES['pictures']['error'][$key]) || !in_array( $fileExtension, EXTENSIONS_ARR) || $_FILES['pictures']['size'][$key] > maxLimitSize){
          $uploadResult[] = ['error' => "Ошибка загрузки файла $originFileName"];
        } else {
          $changedFileName = preg_replace('/[^a-zA-Zа-яёА-ЯЁ0-9_\-]/u', '_', $fileName) . '.' . $fileExtension;

          move_uploaded_file($_FILES['pictures']['tmp_name'][$key], $uploadDir . $changedFileName);
          // $uploadResult[] = ['success' => "Файл \"$originFileName\" загружен."];
          // $uploadFiles[] = ['file' => UPLOAD_DIR . $changedFileName];
          $uploadResult[] = [
            'success' => "Файл \"$originFileName\" загружен.",
            'filePath' => UPLOAD_DIR . $changedFileName
          ];
        }
      }
    } else {
      $uploadResult[] = ['error' => 'Одновременно можно загрузить от одного до пяти изображений.'];
    }
  } else {
    $uploadResult[] = ['error' => "Ошибка директории $uploadDir"];
  }
  // echo json_encode($uploadResult);
  // $data = [
  //   'uploadResult' => $uploadResult,
  //   'uploadFiles' => $uploadFiles
  // ];

  // echo json_encode($data);
  echo json_encode($uploadResult);
} 