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

$page_content = include_template("main-login.php", [
  "navigation" => $navigation,
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
    if ($user_data) {
      if (password_hash($user_data["email"], $user_data["password"])) {
        $is_session = session_start();
        $_SESSION['name'] = $user_data["user_name"];
        $_SESSION['id'] = $user_data["id"];

        header("Location: /index.php");
      } else {
        $errors["password"] = "Вы ввели не верный пароль";
      }
    } else {
      $errors["email"] = "Пользователь с таким e-mail не зарегистрирован";
    }

    if (count($errors)) {
      $page_content = include_template("main-login.php", [
        "categories" => $categories,
        "user_info" => $user_info,
        "errors" => $errors
      ]);
    }
  }
}

$layout_content = include_template("layout.php", [
  "content" => $page_content,
  "categories" => $categories,
  "title" => "Регистрация",
  "is_auth" => $is_auth,
  "user_name" => $user_name ?? null
]);

print($layout_content);