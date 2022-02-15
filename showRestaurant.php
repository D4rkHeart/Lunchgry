<?php
include_once 'database.php';
include_once 'header.html';
$db = new dbQuery();
$id = $_GET["id_restaurant"];
$restaurant = $db->getOneRestaurant($id);
?>
<div class="container">
  <h2><?php echo $restaurant["restaurant_nom"] ?></h2>
  <div class="buttonPosition"><button type="button" class="col col-button" onclick="history.back()">Retour</button> </div>
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Restaurant</div>
        <div class="col col-2">Provenance</div>
        <div class="col col-3">Type</div>
      </li>
      <li class="table-row">
        <div class="col col-1" ><?php echo $restaurant["restaurant_nom"] ?></div>
        <div class="col col-2"><?php echo $restaurant["restaurant_pays"] ?></div>
        <div class="col col-3"><?php echo $restaurant["restaurant_type"] ?></div>
      </li>
    </ul>
</div>
<?php
include_once 'footer.html';
