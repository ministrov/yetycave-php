<?php
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");

$categories = get_categories($connect);

$sql = get_query_list_lots('2021-07-15');

$res = mysqli_query($connect, $sql);

if ($res) {
    $goods = get_arrow($res);
} else {
    $error = mysqli_error($connect);
}

$page_content = include_template("main.php", [
    "categories" => $categories,
    "goods" => $goods
]);

$layout_content = include_template("layout.php", [
    "content" => $page_content,
    "categories" => $categories,
    "title" => "Главная",
    "is_auth" => $is_auth,
    "user_name" => $user_name ?? null
]);

print($layout_content);
