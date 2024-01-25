<?php
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");

$categories = get_categories($connect);
// $categories_id = array_column($categories, "id");

$page_content = include_template("main-add.php", [
  "categories" => $categories
]);

if ($_SERVER["REQUEST_METHOD" === "POST"]) {
  $required = ["lot-name", "category", "message", "lot-rate", "lot-step", "lot-date"];
  $errors = [];

  $rules = [
    "category" => function($value, $categories_id) {
      return validate_category($value, $categories_id);
    },
    "lot-rate" => function($value) {
      return validate_number($value);
    },
    "lot-step" => function($value) {
      return validate_number($value);
    },
    "lot-date" => function($value) {
      return validate_date($value);
    },
  ];

  $lot = filter_input_array(
    INPUT_POST,
    [
      "lot-name" => FILTER_DEFAULT,
      "category" => FILTER_DEFAULT,
      "message" => FILTER_DEFAULT,
      "lot-rate" => FILTER_DEFAULT,
      "lot-step" => FILTER_DEFAULT,
      "lot-date" => FILTER_DEFAULT
    ],
    true
  );

  print_r($lot);
}

// $page_head = include_template("head.php", [
//   "title" => "Добавить лот"
// ]);

$layout_content = include_template("layout-add.php", [
  "content" => $page_content,
  "categories" => $categories,
  "is_auth" => $is_auth,
  "user_name" => $user_name
]);

// print($page_head);
print($layout_content);