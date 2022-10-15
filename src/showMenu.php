<?php

namespace showMenu;

/**
 * Функция для отображения меню
 * @param array $array - принимает массив меню
 * @param string $key - ключ массива по которому необходимо выполнить сортировку, по умолчанию 'sort'
 * @param string $line - принимает аргументы 'true' или 'false', в в зависимости от условия выводит массив по горизонтали или по вертикале
 * @return возвращает вёрстку
 */
function showMenu(array $array, string $key = 'sort', bool $line = true)
{
    $sortedArray = ($key != 'sort') ? arraySort($array, $key, SORT_DESC) : arraySort($array); ?>

    <div class="<?=$line ? 'clear' : 'clearfix'?>">
        <ul class="main-menu <?=$line ? '' : 'bottom'?>">
            
            <?php foreach ($sortedArray as $value) {
                $curTitle = $value['title'];
                $curPath = $value['path'];
                
                $textDecorat = (getTitle($array) == $curTitle) ? 'link_text-decoration' : '';
                $textSize = $line ? 'link_font-size-16' : 'link_font-size-12';?> 
                
                <li><a class="<?="$textSize $textDecorat"?>" href=<?=$curPath?>><?=cutString($curTitle)?></a></li> 
            <?php } ?>
        </ul>
    </div>

<?php }
