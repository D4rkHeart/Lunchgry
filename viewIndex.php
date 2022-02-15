<?php
include_once 'header.html';
include_once 'database.php';
$db = new dbQuery();
?>
<div class="container">
  <h2>Liste de tous les restaurants</h2>
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Restaurant</div>
        <div class="col col-2">Infos</div>
        <div class="col col-3">Modifier</div>
        <div class="col col-4">Supprimer</div>
      </li>
<?php $restaurantsSelect = $db->getAllRestaurant(); foreach($restaurantsSelect as $restaurant){ ?>
      <li class="table-row">
        <div class="col col-1" ><?php echo $restaurant["restaurant_nom"]?></div>
        <div class="col col-2"><button type="button" class="col col-button" onclick="window.location.href='showRestaurant.php?id_restaurant=<?php echo $restaurant['id_restaurant']?>'">Détail</button></div>
        <div class="col col-3"><button type="button" class="col col-button" onclick="window.location.href='editRestaurant.php?id_restaurant=<?php echo $restaurant['id_restaurant']?>'">Éditer</button></div>
        <div class="col col-3"><button type="button" class="col col-button" onclick="window.location.href='deleteRestaurant.php?id_restaurant=<?php echo $restaurant['id_restaurant']?>'">Supprimer</button></div>
      </li>
<?php } ?>
    </ul>
    <div class="buttonPosition"><button type="button" class="col col-button" onclick="window.location.href='newRestaurant.php'">Ajouter un nouveau restaurant</button> </div>
<?php
include_once 'footer.html';
?>