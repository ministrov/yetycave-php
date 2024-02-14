<?php
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");

$categories = get_categories($connect);

$page_content = include_template("main-404.php", [
  "categories" => $categories
]);

$layout_content = include_template("layout.php", [
  "content" => $page_content,
  "categories" => $categories,
  "title" => "Страница не найдена",
  "is_auth" => $is_auth,
  "user_name" => $user_name ?? ''
]);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if ($id) {
  $sql = get_query_lot($id);
} else {
  print($page_content);
  die();
}

$res = mysqli_query($connect, $sql);
if ($res) {
  $lot = get_arrow($res);
} else {
  $error = mysqli_error($connect);
}

if (!$lot) {
  print($layout_content);
  die();
}

$navigation = include_template("navigation.php", [
  "categories" => $categories
]);

$page_content = include_template("main-lot.php", [
  "categories" => $categories,
  "navigation" => $navigation,
  "lot" => $lot,
  "is_auth" => $is_auth,
]);

$layout_content = include_template("layout.php", [
  "content" => $page_content,
  "categories" => $categories,
  "title" => $lot['title'],
  "is_auth" => $is_auth,
  "user_name" => $user_name ?? ''
]);

print($layout_content);
