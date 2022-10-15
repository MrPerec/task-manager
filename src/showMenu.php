<?php

namespace showMenu;

/**
 * Функция для отображения меню, в зависимости от параметра key и авторизации пользователя, 
 * сортирует массив меню по полю sort в порядке возрастания, либо по полю title в обратном алфавитном порядке.
 * Если пользователь не авторизован то выводит меню "Главная"
 * @param array $array - принимает массив меню
 * @param string $key - ключ массива по которому необходимо выполнить сортировку, по умолчанию 'sort'
 * @param string $line - принимает аргументы 'true' или 'false', в в зависимости от условия выводит массив по горизонтали или по вертикале
 * @return возвращает вёрстку
 */

function showMenu(array $array, string $key = 'sort', bool $line = true)
{
    $sortedArray = ($key != 'sort') ? arraySort($array, $key, SORT_DESC) : arraySort($array); ?>

    <div class="<?=$line ? 'clear' : 'clearfix'?>">
        <ul class="main-menu <?=$line ? '' : 'bottom'?>"> <?php 

        if (isLogin()) {
            foreach ($sortedArray as $value) {
                $curTitle = $value['title'];
                $curPath = $value['path'];
                
                $textDecor = (getTitle($array) == $curTitle) ? 'link_text-decoration' : '';
                $textSize = $line ? 'link_font-size-16' : 'link_font-size-12';
                
                ?> <li><a class="<?="$textSize $textDecor"?>" href=<?=$curPath?>><?=cutString($curTitle)?></a></li> <?php 
            } 
        } else {
            $curTitle = $array[array_key_first($array)]['title'];
            $curPath = $array[array_key_first($array)]['path'];
            
            $textDecor = 'link_text-decoration';
            $textSize = $line ? 'link_font-size-16' : 'link_font-size-12';

            ?> <li><a class="<?="$textSize $textDecor"?>" href=<?=$curPath?>><?=cutString($curTitle)?></a></li> <?php 
        } ?>

        </ul>
    </div> <?php
 }
