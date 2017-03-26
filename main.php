<?php

require "Item.php";
require "Weapon.php";

$railgun = new Weapon('Railgun', 600, 20, 100);

$name = $railgun->name;
$weight = $railgun->weight;
$damage = $railgun->damage;
$distance = $railgun->distance;

// Выброс исключения: свойство name только для чтения
$railgun->name = "Machine gun";

// Выброс исключения: не существует свойства price ни для чтения, ни для записи
$price = $railgun->price;
$railgun->price = 200;
