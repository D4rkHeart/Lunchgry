<?php
include_once 'database.php';
/*------RESTAURANT-------*/
$db = new dbQuery();
print_r($_POST);
$restaurant_nom = $_POST['restaurant_nom'];
$restaurant_pays = $_POST['restaurant_pays'];
$restaurant_type = $_POST['restaurant_type'];
$id = $_GET["id"];
$result= $db->updateRestaurants($id,$restaurant_nom,$restaurant_pays,$restaurant_type);
if($result === true){
    header('Location: viewIndex.php');
  }else{
    var_dump($result);
}

?>
