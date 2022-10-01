<?php

$uploadDirPath = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR;
$uploadDirFiles = scandir($uploadDirPath);

foreach ($uploadDirFiles as $key => $fileName) {
  if (!is_dir($fileName)) {
    $fileLastAccessTime = date('d-m-Y_H-i-s', fileatime($fileName));
    $fileChangeIndxTime = date('d-m-Y_H-i-s', filectime($fileName));
    $fileLastChangeTime = date('d-m-Y_H-i-s', filemtime($fileName));
    
    var_dump("$fileLastAccessTime - $fileName Время последнего доступа к файлу");
    var_dump("$fileChangeIndxTime - $fileName Время изменения индексного дескриптора файла");
    var_dump("$fileLastChangeTime - $fileName Время последнего изменения файла");
    // var_dump(stat($fileName));
  }
}

?>

<p>
  <p>Для добавления изображений в галерею нажмите <a href='/route/gallery/create/'>тут</a></p>
  <hr class="my-4">

  <div class="grid-container">
    <?php 
      if (isset($picturesArr)) {
        foreach ($picturesArr as $picture) {?>
          <figure class="text-center">
            <p><img src="<?=$picture['img']?>" alt="<?=$picture['name']?>" /></p>
            <figcaption><?=$picture['name']?></figcaption>
            <span>Дата загрузки: <?=$picture['dateLoad']?></span>
            <div class="form-check-del-this">
              <input type="checkbox" id="<?=$picture['id']?>">
              <label class="form-check-del-this__label" for="<?=$picture['id']?>">Удалить</label>
            </div>
          </figure>
        <?php }
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