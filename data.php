<?php
require __DIR__ . '/vendor/autoload.php';
session_start();

$is_auth = !empty($_SESSION["name"]);

dump($is_auth);
if ($is_auth) {
  $user_name = $_SESSION["name"];

  dump($user_name);
  dump($_SESSION);
}