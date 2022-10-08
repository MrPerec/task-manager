<?php

$uploadDirPath = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR;

if (isset($_POST["delPicturesAll"])) {
  array_map('unlink', glob($uploadDirPath . '*'));
}

if (isset($_POST["delPicturesArr"])) {
  foreach ($_POST["delPicturesArr"] as $pictureName) {
    unlink($uploadDirPath . $pictureName);
  }
}

?>

<form class="js-form">
  <input type="file" name="pictures[]" multiple>
  <br>
  <br>
  <input type="submit">
</form>

<form method="POST" action="<?=$uri?>">
  <hr class="my-4">
  <div class="grid-container">
    
    <?php foreach (scandir($uploadDirPath) as $key => $fileName) {
      if (!is_dir($fileName)) {
        $uploadTime = date('d-m-Y H-i-s', filectime($uploadDirPath . $fileName));?>
        
        <figure class="text-center">
          <p><img src="<?=UPLOAD_DIR . $fileName?>" alt="<?=$fileName?>" /></p>
          <figcaption><?=$fileName?></figcaption>
          <span>Дата загрузки: <?=$uploadTime?></span>
          <div class="form-check-del-this">
            <input type="checkbox" id="<?=$key?>" name="delPicturesArr[<?=$key?>]" value="<?=$fileName?>">
            <label class="form-check-del-this__label" for="<?=$key?>">Удалить</label>
          </div>
        </figure>
    
      <?php }
    }?>
      
  </div>
  <hr class="my-4">

    <div class="form-check-del-all text-center">
      <input type="checkbox" id="delPicturesAll" name="delPicturesAll" value="delPicturesAll">
      <label class="form-check-del-all__label" for="delPicturesAll">Удалить всё</label>
      <br>
      <br>
      <input class="btn" type="submit" value="Удалить"></input>
    </div>
</form>
</td>
<!-- <script type="text/javascript" src="/js/jquery-3.6.1.min.js"></script> -->
<script type="text/javascript" src="/js/script.js"></script>