<?php
include_once 'database.php';
$db = new dbQuery();
$id = $_GET["id_restaurant"];
$result = $db->deleteRestaurants($id);
if($result === true){
    header('Location: viewIndex.php');
  }else{
    var_dump($result);
}
?>