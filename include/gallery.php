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

<p>Для добавления изображений в галерею нажмите <a href='/route/gallery/create/'>тут</a></p>
<form class="text-center" method="POST" action="<?=$uri?>">
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

  <div class="form-check-del-all">
    <input type="checkbox" id="delPicturesAll" name="delPicturesAll" value="delPicturesAll">
    <label class="form-check-del-all__label" for="delPicturesAll">Удалить всё</label>
  </div>
  <br>
  <input class="btn" type="submit" value="Удалить"></input>
</form>
</td>