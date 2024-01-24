<?php
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");

$categories = get_categories($connect);
// $categories_id = array_column($categories, "id");

print_r($categories_id);

$page_content = include_template("main-add.php", [
  "categories" => $categories
]);
print("Hi from add.php!!");