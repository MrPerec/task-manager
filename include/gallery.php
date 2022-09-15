<p>
  <p>Для добавления изображений в галерею нажмите <a href='/route/gallery/create/'>здесь</a></p>
  <hr class="my-4">

  <div class="grid-container">
    <?php 
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
    <?php }?>
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