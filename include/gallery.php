<?php

$uploadDirPath = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR;
$uploadDirFiles = scandir($uploadDirPath);

if (isset($_POST["userPictures"])) {
  foreach ($_POST["userPictures"] as $id => $picture) {
    unlink($uploadDirPath . $id);
  }
}

?>

<p>Для добавления изображений в галерею нажмите <a href='/route/gallery/create/'>тут</a></p>
<form class="text-center" method="POST" action="<?=$uri?>">
  <hr class="my-4">
  <div class="grid-container">
    
    <?php 
      if (count($uploadDirFiles) > 2) {
        foreach ($uploadDirFiles as $key => $fileName) {
          if (!is_dir($fileName)) {
            $uploadTime = date('d-m-Y H-i-s', filemtime($uploadDirPath . $fileName));?>
            
            <figure class="text-center">
              <p><img src="<?=UPLOAD_DIR . $fileName?>" alt="<?=$fileName?>" /></p>
              <figcaption><?=$fileName?></figcaption>
              <span>Дата загрузки: <?=$uploadTime?></span>
              <div class="form-check-del-this">
                <input type="checkbox" id="<?=$key?>" name="userPictures[<?=$fileName?>]">
                <label class="form-check-del-this__label" for="<?=$key?>">Удалить</label>
              </div>
            </figure>
        
        <?php }
        }
      }?>
      
  </div>
  <hr class="my-4">

  <div class="form-check-del-all">
    <input type="checkbox" class="" id="del-all">
    <label class="form-check-del-all__label" for="del-all">Удалить всё</label>
  </div>
  <br>
  <input class="btn" type="submit" name="remove" value="Удалить"></input>
</form>
</td>