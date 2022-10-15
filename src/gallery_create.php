<?php

if (isset($_FILES['pictures'])) {
  $totalFiles = count($_FILES['pictures']['name']);
  $uploadError = $_FILES['pictures']['error'][array_key_first($_FILES['pictures']['error'])];
  
  if ($uploadError != UPLOAD_ERR_NO_FILE && $totalFiles < 6) {
    include_once ('constants.php');

    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR;
    $maxLimitSize = 2 * 1024 * 1024;

    for($key = 0; $key < $totalFiles; $key++) {
      $originFileName = $_FILES['pictures']['name'][$key];
      $fileName = pathinfo($originFileName, PATHINFO_FILENAME);
      $fileExtension = strtolower(pathinfo($originFileName, PATHINFO_EXTENSION));

      if (!empty($_FILES['pictures']['error'][$key]) || !in_array($fileExtension, EXTENSIONS) || $_FILES['pictures']['size'][$key] > $maxLimitSize){
        $result[] = [
          'loaded' => false,
          'message' => "Error loading file \"$originFileName\".",
          'fileName' => $originFileName,
        ];
      } else {
        $changedFileName = preg_replace('/[^a-zA-Zа-яёА-ЯЁ0-9_\-]/u', '_', $fileName) . '.' . $fileExtension;
        $fileSize = $_FILES['pictures']['size'][$key];

        move_uploaded_file($_FILES['pictures']['tmp_name'][$key], $uploadDir . $changedFileName);
        
        $uploadTime = date('d-m-Y H-i-s', filectime($uploadDir . $changedFileName));

        $result[] = [
          'loaded' => true,
          'message' => "The file \"$originFileName\" has been uploaded.",
          'fileName' => $changedFileName,
          'uploadTime' => $uploadTime,
          'filePath' => UPLOAD_DIR . $changedFileName,
          'fileSize' => $fileSize,
        ];
      }
    }
  } else {
    $result[] = [
      'loaded' => false,
      'message' => 'You can upload from one to five images at a time.',
    ];
  }

  echo json_encode($result);
} 