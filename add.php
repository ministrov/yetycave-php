<?php
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");

$categories = get_categories($connect);
$categories_id = array_column($categories, "id");

foreach ($categories_id as $item) {
  print_r(var_dump($item));
}

// print_r($categories_id);

$page_content = include_template("main-add.php", [
  "categories" => $categories
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $required = ["lot-name", "category", "message", "lot-rate", "lot-step", "lot-date"];
  $errors = [];

  $rules = [
    "category" => function ($value, $categories_id) {
      return validate_category($value, $categories_id);
    },
    "lot-rate" => function ($value) {
      return validate_number($value);
    },
    "lot-step" => function ($value) {
      return validate_number($value);
    },
    "lot-date" => function ($value) {
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

  if (count($errors)) {
    $page_content = include_template("main-add.php", [
      "categories" => $categories,
      "lot" => $lot,
      "errors" => $errors
    ]);
  } else {
    $sql = get_query_create_lot(2);
    $stmt = db_get_prepare_stmt_version($con, $sql, $lot);
    // $res = mysqli_stmt_execute($stmt);

    if ($res) {
      $lot_id = mysqli_insert_id($con);
      header("Location: /lot.php?id=" . $lot_id);
    } else {
      $error = mysqli_error($con);
    }
  }
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
