<?php
session_start();
$is_auth = !empty($_SESSION["name"]);
print_r($is_auth);

print_r(gettype($is_auth));
if ($is_auth) {
  $user_name = $_SESSION["name"];
}