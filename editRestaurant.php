<?php
include_once 'database.php';
$db = new dbQuery();
$id = $_GET["id_restaurant"];
$runningAction = "updateRestaurant.php?id=$id";
$submitText = "Modifier";
$restaurant = $db->getOneRestaurant($id);
include_once 'restaurantForm.php';


