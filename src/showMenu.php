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
    if ($key != 'sort') {
        $sortedArray = arraySort($array, $key, SORT_DESC);
    } else {
        $sortedArray = arraySort($array);
    }?>

    <div class="<?=$line ? 'clear' : 'clearfix'?>">
        <ul class="<?=$line ? 'main-menu' : 'main-menu bottom'?>">
            <?php foreach ($sortedArray as $value) {
                $curTitle = $value['title'];
                $curPath = $value['path'];

                if (getTitle($array) == $curTitle) {
                    ?>
                    <li><a class="<?=$line ? 'link_font-size-16 link_text-decoration' : 'link_font-size-12 link_text-decoration'?>" href=<?=$curPath?>><?=cutString($curTitle)?></a></li>
                <?php } else { ?>
                    <li><a class="<?=$line ? 'link_font-size-16' : 'link_font-size-12'?>" href=<?=$curPath?>><?=cutString($curTitle)?></a></li>
                <?php }
            } ?>
        </ul>
    </div>

<?php }
