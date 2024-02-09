<?php
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");

$categories = get_categories($connect);
$cats = ["Животные", "Люди", "Наука", "Приколы", "Спорт", "Видеоигры"];

$page_content = include_template("main-test.php", [
  "cats" => $cats
]);

$layout_content = include_template("layout.php", [
  "content" => $page_content,
  "categories" => $categories,
  "title" => "Тестовая страница",
  "is_auth" => $is_auth,
  "user_name" => $user_name
]);

print($layout_content);

// function get_greeting_function() {
//   $time_of_day = "morning";

//   return (function ($name) use (&$time_of_day) {
//     $time_of_day = ucfirst($time_of_day);
//     return ("Good $time_of_day, $name!");
//   });
// };

// $greeting_func = get_greeting_function();

// echo $greeting_func("Fred");

// $anonymous_func = function($name, $age) {
//   return "My name is $name, and my age is $age";
// };

// print($anonymous_func('Anton', 40));


// $cat = [
//   'gender' => 'male',
//   'name' => 'keks',
//   'color' => 'yellow',
//   'age' => 2
// ];

// // Получить все ключи из массива
// $keys = array_keys($cat);

// // Получить последний ключ
// $last_key = array_pop($cat);

// print_r($keys);
// print("<br>");
// print_r($last_key);

// // Получить значение по этому ключу
// $last_val = $gif[$last_key];

// $opts = [21, "Венцеслав", true, 176];
// list($age, $name, $is_male, $height) = $opts;

// // Разделили значения в строке знаком "точка с запятой"
// $salad_str = "Руккола;Маслины;Листья салата;Помидоры";
// $salad_arr = explode(";", $salad_str);

// var_dump($salad_arr);

// $cats = ["Животные", "Люди", "Наука", "Приколы", "Спорт", "Видеоигры"];

// $cats[]  = "Победы";

// array_unshift($cats, "Спорт");

// $cats_length = count($cats);

// $last_index = $cats_length - 1;

// print_r($cats);

// print("Last value: " . $cats[$last_index]);

// print($last_index);

// $cats_str = implode(",", $cats);

// print($cats_str);

// $is_val_exist = in_array("Люди", $cats);

// print($is_val_exist);

// $cat_count = count($cat);

// print($cat_count);
// print($cat);

// $cat_gender = $cat['gender'];

// $new_cat_gender = $cat['gender'] = 'female';

// print($cat_gender);
// // print($new_cat_gender);
// print("<br>");
// print_r($cat);

// $var = "String";

// function print_info($str, $array = []) {
//   if (var_dump($str) === 'string') {
//     print($str);
//   } 

//   if (var_dump($array) === 'array') {
//     print_r($array);
//   }
// }

// print_info($var);
// print_info("<br>");

// $categories = [
//   "Видеоигры", "Животные", "Люди", "Наука", "Приколы",
//   "Спорт", "Фейлы", "Фильмы и анимация"
// ];

// $rand_key = array_rand($categories);

// print($rand_key);
// print_info("<br>");

// foreach($categories as $key => $value) {
//   print("$key: $value" . "<br>");
// }

// function generatePassword(int $length = 0): string {
//   if ($length < 1) return '';

//   $arr = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n',
//     'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N',
//     '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
//   );

//   $password = '';
//   $max = count($arr) - 1;

//   for ($i = 0; $i < $length; $i++) {
//     $password .= $arr[mt_rand(0, $max)];
//   }

//   return $password;
// }

// echo generatePassword(12);
// generat a random number
// echo mt_rand(1, 10);
// echo mt_rand(1, 10);
// echo mt_rand(1, 10);
// echo mt_rand(1, 10);
// echo mt_rand(1, 10);
// echo mt_rand(1, 10);

// $consumers = array(12, 33, 555, 66);

// foreach ($consumers as $key => $value) {
//   print("$key : $value <br>");
// }

// print_r($consumers);

// function printArgs($arg_1 = '', $arg_2 = '', $arg_3 = '') {
//   echo 'Аргумент 1: ' . $arg_1 . PHP_EOL . '<br>';
//   echo 'Аргумент 2: ' . $arg_2 . PHP_EOL . '<br>';
//   echo 'Аргумент 3: ' . $arg_3 . PHP_EOL . '<br>';
// }

// printArgs(1, 3, 4) or die('OOOPs');

// die();

// $headers_keys = [
//   "Язык браузера" => "ACCEPT_LANGUAGE",
//   "Страница перехода" => "REFERER",
//   "Поддерживаемый контент" => "ACCEPT",
//   "Браузер и ОС пользователя" => "USER_AGENT",
//   "Домен сайта" => "HOST",
// ];

// foreach ($headers_keys as $name => $key) {
//   $server_key = "HTTP_" . $key;

//   if (isset($_SERVER[$server_key])) {
//     $value = $_SERVER[$server_key];
//     print("<b>$name</b>: $value<br>");
//   }
// }
// $date_time = date('l jS \of F Y h:i:s A');

// print($date_time);

// $post = $_POST;

// print_r($post);
// require_once("functions.php");

// $arr = [1, 3, 4, 6, 7];

// foreach ($arr as $item) {
//   console_log($item);
// }

// $header = $_SERVER['HTTP_ACCEPT'];
// $query_parameter = $_GET;

// print_r($header . "<br>");
// print_r($query_parameter);
// $header = headers_list();

// print_r($header);

// $peace = 'World';

// $msg = "Hello $peace";

// function show_message(string $txt) {
//   print($txt);
// }

// show_message($msg);

// $arr = array(1, 2, 5, 6);

// foreach ($arr as $value) {
//   print_r($value);
// }

// var_dump($arr);

// print_r($arr);

// $var_1 = 0;

// $var_2 = (bool)$var_1;

// var_dump($var_2);

// var_dump($var_1);

// $x = 15;

// print_r($x);

// echo $_SERVER['DOCUMENT_ROOT'];

// echo PHP_OS . "<br>";
// echo PHP_VERSION . "<br>";

// if (isset($x) > 0) {
//   print(isset($x));
// }

// unset($x);

// print($x);

// print_r(get_defined_constants()); Output all constant in PHP
// $con = mysqli_connect("localhost", "root", "", "yeticave");
// $sql = "SELECT * FROM categories";
// $result = mysqli_query($con, $sql);

// $result_row = mysqli_fetch_assoc($result);

// // $result_count = mysqli_num_rows($result);

// // print(json_encode($result_row));
// print($result_row);

// $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

// foreach ($categories as $category) {
//   print("Category: " . $category);
// }

// $a = 1;
// $number_1 = 4;
// $number_2 = 3;

// $b = "Hello World";
// $name = 'Anton';
// $brother = 'Denis';
// const PI = 3.14;
// $result = $name . ' ' . $brother;

// if ($name or $brother) {
//   echo "My name: $name";
// }

// // while ($a <= 10) {
// //   echo "Loop number " . $a++;
// // }

// echo "\n";

// if ("10" !== 10) {
//   echo "Not the same data type";
// }

// echo $result;
// echo PI;

// $new_str = str_replace("World", "bg", $b);

// echo $new_str;

// function calculate_numbers($num_1, $num_2) {
//   return $num_1 + $num_2;
// }

// echo calculate_numbers($number_1, $number_2);

// function personal_info($name, $age) {
//   echo "My name is $name, and I'm $age";
// }

// personal_info($name, 40);

// $con = mysqli_connect("localhost", "root", "", "yeticave");

// mysqli_set_charset($con, "utf8");

// $categories = mysqli_query($con, "SELECT * FROM categories");

// while ($row = $categories -> fetch_assoc()) {
//   print($row);
// }

// if ($con == false) {
//   print("Error of connection: " . mysqli_connect_error());
// } else {
//   print($categories);
// }
