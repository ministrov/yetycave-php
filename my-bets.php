<?php
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");

$categories = get_categories($connect);
$navigation = include_template("navigation.php", [
  "categories" => $categories
]);

if ($is_auth) {
  $bets = get_bets($connect, $_SESSION["id"]);
}

$page_content = include_template("main-my-bets.php", [
  "categories" => $categories,
  "navigation" => $navigation,
  "bets" => $bets,
  "is_auth" => $is_auth
]);

$layout_content = include_template("layout.php", [
  "content" => $page_content,
  "categories" => $categories,
  "title" => $lot["title"] ?? null,
  "is_auth" => $is_auth,
  "user_name" => $user_name
]);

print($layout_content);