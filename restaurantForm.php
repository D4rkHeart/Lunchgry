<?php
include_once 'header.html';
$db = new dbQuery();
?>

<div class="container">
  <div class="buttonPosition"><button type="button" class="col col-button" onclick="history.back()">Retour</button></div>
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Restaurant</div>
        <div class="col col-2">Provenance</div>
        <div class="col col-3">Type</div>
      </li>
  <form method="post" action="<?php echo $runningAction ?>">
      <li class="table-row">
        <div class="col col-1" ><input type="text" name="restaurant_nom" value="<?php echo $restaurant["restaurant_nom"]?>"></div>
        <div class="col col-2"><input type="text" name="restaurant_pays" value="<?php echo $restaurant["restaurant_pays"]?>"></a></div>
        <div class="col col-3"><select name="restaurant_type"></div><?php foreach($db->restaurant_typeOption() as $option) { print("<option value='$option'>$option</option>"); }?></select>
      </li>
      <div class="buttonPositionPostForm"><button class="col col-button" type="submit" value="save"><?php echo $submitText ?></button></div>
  </form>
    </ul>
</div>
<?php
include_once 'footer.html';
?>

