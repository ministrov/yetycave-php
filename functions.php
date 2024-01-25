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

  return "$number ₽";
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

/**
 * Возвращает массив из объекта результата запроса
 * @param object $result_query mysqli Результат запроса к базе данных
 * @return array
*/

function get_arrow($result_query) {
  $row = mysqli_num_rows($result_query);

  if ($row === 1) {
    $arrow = mysqli_fetch_assoc($result_query);
  } else if ($row > 1) {
    $arrow = mysqli_fetch_all($result_query, MYSQLI_ASSOC);
  }

  return $arrow;
}

/**
 * Валидирует поле категории, если такой категории нет в списке
 * возвращает сообщение об этом
 * @param int $id категория, которую ввел пользователь в форму
 * @param array $allowed_list Список существующих категорий
 * @return string Текст сообщения об ошибке
*/

function validate_category($id, $allowed_list) {
  if (!in_array($id, $allowed_list)) {
    return "Указана несуществующая категория";
  }
}

/**
 * Проверяет что содержимое поля является числом больше нуля
 * @param string $num число которое ввел пользователь в форму
 * @return string Текст сообщения об ошибке
*/

function validate_number($num) {
  if (!empty($num)) {
    $num *= 1;

    if (is_int($num) && $num > 0) {
      return NULL;
    }
    return "Содержимое поля должно быть целым числом больше ноля";
  }
}

/**
 * Проверяет что дата окончания торгов не меньше одного дня
 * @param string $date дата которую ввел пользователь в форму
 * @return string Текст сообщения об ошибке
 */
function validate_date($date)
{
  if (is_date_valid($date)) {
    $now = date_create("now");
    $d = date_create($date);
    $diff = date_diff($d, $now);
    $interval = date_interval_format($diff, "%d");

    if ($interval < 1) {
      return "Дата должна быть больше текущей не менее чем на один день";
    };
  } else {
    return "Содержимое поля «дата завершения» должно быть датой в формате «ГГГГ-ММ-ДД»";
  }
};

function console_log($data){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}