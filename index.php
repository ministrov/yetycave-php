<?php
// require_once("testing.php");
require_once("helpers.php");
require_once("data.php");
$db = require_once("db.php");

$link = mysqli_connect($db["host"], $db["user"], $db["password"], $db["database"]);

mysqli_set_charset($link, "utf8");

print_r($db);

$page_content = include_template("main.php", [
    "categories" => $categories,
    "goods" => $goods
]);

$layout_content = include_template("layout.php", [
    "content" => $page_content,
    "categories" => $categories,
    "title" => "Главная",
    "is_auth" => $is_auth,
    "user_name" => $user_name
]);

print($layout_content);
