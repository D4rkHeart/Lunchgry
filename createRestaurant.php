<?php
include_once 'database.php';
$db = new dbQuery();
/*------CREATE-------*/
$db = new dbQuery();
var_dump($_POST);
$restaurant_nom = $_POST['restaurant_nom'];
$restaurant_pays = $_POST['restaurant_pays'];
$restaurant_type = $_POST['restaurant_type'];
$result= $db->addRestaurant($restaurant_nom,$restaurant_pays,$restaurant_type);
if($result === true){
    header('Location: viewIndex.php');
  }else{
    var_dump($result);
}

/*------option-------*/
$db->restaurant_typeOption();
?>
