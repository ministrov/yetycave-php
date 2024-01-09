<?php

/**
 * Функция должна возвращать результат — отформатированную сумму вместе со знаком рубля
 * Функция должна принимать один аргумент — целое число
 *
 * Пример использования:
 * $number = 123456;
 * 
 * get_format_number($number);
 * 
 * Результат: "10 000 ₽"
 *
 * @param int $number 
 *
 * @return string Добавить к итоговой строке пробел и знак рубля — ₽.
 */

function get_format_number($number) {
  $number = ceil($number);

  if ($number > 1000) {
    $number = number_format($number, 0, '', ' ');
  }

  return $number . " " . "₽";
}


/**
 * Возвращеет количество целых часов и остатка минут от настоящего времени до даты
 * @param string $date Дата истечения времени
 * @return array
*/

function get_time_left($date) {
  date_default_timezone_set('Europe/Moscow');

  $final_date = date_create($date);
  $cur_date = date_create();

  $diff = date_diff($final_date, $cur_date);
  $format_diff = date_interval_format($diff, "%d %H %I");

  $arr = explode(" ", $format_diff);

  $hours = $arr[0] * 24 + $arr[1];
  $minutes = intval($arr[2]);

  $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
  $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);

  $res[] = $hours;
  $res[] = $minutes;

  return $res;
}