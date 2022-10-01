<?php

$uploadDirPath = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR;
$uploadDirFiles = scandir($uploadDirPath);

?>

<p>
  <p>Для добавления изображений в галерею нажмите <a href='/route/gallery/create/'>тут</a></p>
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
                <input type="checkbox" id="<?=$key?>">
                <label class="form-check-del-this__label" for="<?=$key?>">Удалить</label>
              </div>
            </figure>
        
        <?php }
        }
      }?>
  </div>

  <hr class="my-4">
  <form class="text-center">
    <p>
      <div class="form-check-del-all">
        <input type="checkbox" class="" id="del-all">
        <label class="form-check-del-all__label" for="del-all">Удалить всё</label>
      </div>
    </p>
      <button class="btn" type="submit">Удалить</button>
  </form>
</p>
</td>