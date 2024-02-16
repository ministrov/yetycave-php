<?php
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");

$categories = get_categories($connect);

$page_content = include_template("main-404.php", [
  "categories" => $categories
]);

$layout_content = include_template("layout.php", [
  "content" => $page_content,
  "categories" => $categories,
  "title" => "Страница не найдена",
  "is_auth" => $is_auth,
  "user_name" => $user_name ?? ''
]);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

print_r(gettype($id));

if ($id) {
  $sql = get_query_lot($id);
} else {
  print($page_content);
  die();
}

$res = mysqli_query($connect, $sql);
if ($res) {
  $lot = get_arrow($res);
} else {
  $error = mysqli_error($connect);
}

if (!$lot) {
  print($layout_content);
  die();
}

$history = get_bets_history($connect, $id);
print_r($history);
$current_price = max($lot["start_price"], $history["price_bet"]);
$min_bet = $current_price + $lot["step"];

$navigation = include_template("navigation.php", [
  "categories" => $categories
]);

$page_content = include_template("main-lot.php", [
  "categories" => $categories,
  "navigation" => $navigation,
  "lot" => $lot,
  "is_auth" => $is_auth,
  "current_price" => $current_price,
  "min_bet" => $min_bet,
  "id" => $id,
  "history" => $history
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $bet = filter_input(INPUT_POST, "cost", FILTER_VALIDATE_INT);

  if ($bet < $min_bet) {
    $error = "Ставка не может быть меньше $min_bet";
  }
  if (empty($bet)) {
    $error = "Ставка должна быть целым числом, болше ноля";
  }

  if ($error) {
    $page_content = include_template("main-lot.php", [
      "categories" => $categories,
      "navigation" => $navigation,
      "lot" => $lot,
      "is_auth" => $is_auth,
      "current_price" => $current_price,
      "min_bet" => $min_bet,
      "error" => $error,
      "id" => $id,
      "history" => $history
    ]);
  } else {
    $res = add_bet_database($connect, $bet, $_SESSION["id"], $id);
    header("Location: /lot.php?id=" . $id);
  }
}

$layout_content = include_template("layout.php", [
  "content" => $page_content,
  "categories" => $categories,
  "title" => $lot['title'],
  "is_auth" => $is_auth,
  "user_name" => $user_name ?? ''
]);

print($layout_content);
