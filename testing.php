<?php

$con = mysqli_connect("localhost", "root", "", "yeticave");
$sql = "SELECT * FROM categories";
$result = mysqli_query($con, $sql);

$result_row = mysqli_fetch_assoc($result);

// $result_count = mysqli_num_rows($result);

// print(json_encode($result_row));
print($result_row);

// $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

// foreach ($categories as $category) {
//   print("Category: " . $category);
// }

// $a = 1;
// $number_1 = 4;
// $number_2 = 3;

// $b = "Hello World";
// $name = 'Anton';
// $brother = 'Denis';
// const PI = 3.14;
// $result = $name . ' ' . $brother;

// if ($name or $brother) {
//   echo "My name: $name";
// }

// // while ($a <= 10) {
// //   echo "Loop number " . $a++;
// // }

// echo "\n";

// if ("10" !== 10) {
//   echo "Not the same data type";
// }

// echo $result;
// echo PI;

// $new_str = str_replace("World", "bg", $b);

// echo $new_str;

// function calculate_numbers($num_1, $num_2) {
//   return $num_1 + $num_2;
// }

// echo calculate_numbers($number_1, $number_2);

// function personal_info($name, $age) {
//   echo "My name is $name, and I'm $age";
// }

// personal_info($name, 40);

// $con = mysqli_connect("localhost", "root", "", "yeticave");

// mysqli_set_charset($con, "utf8");

// $categories = mysqli_query($con, "SELECT * FROM categories");

// while ($row = $categories -> fetch_assoc()) {
//   print($row);
// }

// if ($con == false) {
//   print("Error of connection: " . mysqli_connect_error());
// } else {
//   print($categories);
// }
