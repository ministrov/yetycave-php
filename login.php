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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $required = ['email', 'password'];
  $errors = [];

  $rules = [
    "email" => function($value) {
      return validate_email($value);
    },
    "password" => function($value) {
      return validate_length($value, 6, 8);
    }
  ];

  // Get values from form inputs and put them into an array
  $user_info = filter_input_array(INPUT_POST, [
    "email" => FILTER_DEFAULT,
    "password" => FILTER_DEFAULT
  ], true);

  // print_r($user_info);

  foreach ($user_info as $field => $value) {
    if (isset($rules[$field])) {
      $rule = $rules[$field];
      $errors[$field] = $rule($value);
    }

    if (in_array($field, $required) && empty($value)) {
      $errors[$field] = "Поле $field нужно заполнить";
    }
  }

  $errors = array_filter($errors);

  if (count($errors)) {
    $page_content = include_template("main-login.php", [
      "categories" => $categories,
      "user_info" => $user_info,
      "errors" => $errors
    ]);
  } else {
    $user_data = get_login($connect, $user_info["email"]);
  }
}

$layout_content = include_template("layout.php", [
  "content" => $page_content,
  "categories" => $categories,
  "title" => "Вход",
  "is_auth" => $is_auth,
  "user_name" => $user_name
]);

print($layout_content);