<?php
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");

$categories = get_categories($connect);
$search = htmlspecialchars($_GET["search"]);

print_r($search);

$page_content = include_template("main-search.php", [
  "categories" => $categories,
  "search" => $search,
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