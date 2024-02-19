<?php
error_reporting(0);
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");

$categories = get_categories($connect);
$search = $_GET["search"];

if ($search) {
  $items_count = get_count_lots($connect, $search);
  $cur_page = $_GET["page"] ?? 1;
  $page_items = 9;
  $pages_count = ceil($items_count / $page_items);
  $offset = ($cur_page - 1) * $page_items;
  $pages = range(1, $pages_count);

  $goods = get_found_lots($connect, $search, $page_items, $offset);
}

// foreach ($goods as $good) {
//   print_r(var_dump($good));
//   print("<br>");
// }

$navigation = include_template("navigation.php", [
  "categories" => $categories
]);

$page_content = include_template("main-search.php", [
  "categories" => $categories,
  "navigation" => $navigation,
  "search" => $search,
  "goods" => $goods,
  // "pagination" => $pagination ?? null,
  "pages_count" => $pages_count,
  "pages" => $pages,
  "cur_page" => $cur_page
]);

$layout_content = include_template("layout.php", [
  "content" => $page_content,
  "categories" => $categories,
  "title" => "Результат поиска",
  "search" => $search,
  "is_auth" => $is_auth,
  "user_name" => $user_name
]);

print($layout_content);