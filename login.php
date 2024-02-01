<?php
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");

$categories = get_categories($connect);

$page_content = include_template("main-login.php", [
  "categories" => $categories
]);

// if () {}

$layout_content = include_template("layout.php", [
  "content" => $page_content,
  "categories" => $categories,
  "title" => "Вход",
  "is_auth" => $is_auth,
  "user_name" => $user_name
]);

print($layout_content);