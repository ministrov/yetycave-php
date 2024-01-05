<?php
require_once("helpers.php");

$categories = [
    "boards" => "Доски и лыжи",
    "bindings" => "Крепления",
    "boots" => "Ботинки",
    "cloths" => "Одежда",
    "tools" => "Инструменты",
    "other" => "Разное"
];

$goods = [
    [
        "title" => "2014 Rossignol District Snowboard",
        "category" => $categories['boards'],
        "price" => 10999,
        "image" => "img/lot-1.jpg"
    ],
    [
        "title" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => $categories['bindings'],
        "price" => 159999,
        "image" => "img/lot-2.jpg"
    ],
    [
        "title" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => $categories['boots'],
        "price" => 8000,
        "image" => "img/lot-3.jpg"
    ],
    [
        "title" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => $categories['cloths'],
        "price" => 10999,
        "image" => "img/lot-4.jpg"
    ],
    [
        "title" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => $categories['tools'],
        "price" => 7500,
        "image" => "img/lot-5.jpg"
    ],
    [
        "title" => "Маска Oakley Canopy",
        "category" => $categories['other'],
        "price" => 5400,
        "image" => "img/lot-6.jpg"
    ],
];

$page_content = include_template("main.php", [
    "categories" => $categories,
    "goods" => $goods
]);

$layout_content = include_template("layout.php", [
    "content" => $page_content,
    "categories" => $categories,
    "title" => "Главная"
]);

print($layout_content);

