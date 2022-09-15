<?php

/**
 * Функция выполняет соритровку массива по указанному полю в порядке возрастания или убывания
 * @param array $array принимает массив
 * @param $key ключ массива по которому будет выполнена соритровка
 * @param $sort метод сортировки, 'SORT_ASC' - сорировка по возрастанию, 'SORT_DESC' - соритровка по убыванию
 * @return array возвращает отсортированный массив
 */
function arraySort(array $array, $key = 'sort', $sort = SORT_ASC): array
{
    usort($array, function (array $a, array $b) use ($key, $sort)
        {
            switch ($sort) {
                case SORT_ASC:
                    return $a[$key] <=> $b[$key];
                case SORT_DESC:
                    return $b[$key] <=> $a[$key];
            }
        }
    );

    return $array;
};