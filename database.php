<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class dbQuery{
  public $servername='localhost';
  public $username='root';
  public $password='root';
  public $dbname = "restaurant_app";
  public $tableNom = "";
  /*public $dbh = "";*/

  function __construct(){
  try {
    $this->dbh = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8mb4",$this->username, $this->password);
    }catch (PDOException $e){
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  /*SELECT * FROM*/
  
  function getAllRestaurant(){
    $sth = $this->dbh->query("SELECT * FROM t_restaurants");
    $all = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $all;
  }
  function getOneRestaurant($editRestaurant_id){
    $getOneRestaurantsInput= [
      'id_restaurant' => $editRestaurant_id,
    ];
    $sth = $this->dbh->prepare("SELECT * FROM t_restaurants WHERE id_restaurant = :id_restaurant");
    $result =$sth->execute($getOneRestaurantsInput);
    if($result === true){
      $one = $sth->fetch(PDO::FETCH_ASSOC);
      return $one;
    }else{
      return $this->dbh->errorInfo();
    }
  }
  

  function getAllPlat(){
    $sth = $this->dbh->query("SELECT * FROM t_plats");
    $all = $sth->fetchAll();
    return $all;
  }

  function getAllIngredient(){
    $sth = $this->dbh->query("SELECT * FROM t_ingredients");  
    $all = $sth->fetchAll();
    return $all;
  }

  /*INSERT INTO */

  function addRestaurant($restaurant_nom,$restaurant_pays,$restaurant_type){
    $restaurantInput = [
      'nom' => $restaurant_nom,
      'pays' => $restaurant_pays,
      'genre' => $restaurant_type,
    ];
    $sth = $this->dbh->prepare("INSERT INTO t_restaurants(restaurant_nom,restaurant_pays,restaurant_type) VALUES (:nom, :pays, :genre)");
    $result =$sth->execute($restaurantInput);
    if($result == true){
      return true;
    }else{
      return $this->dbh->errorInfo();
    }
  }

  function addIngredients(){
    $ingredientInput= [
      'nom' => $ingredient_nom,
      'estSucre' => $ingredient_est_sucre,
      'genre' => $categore_type,
    ];
    $sth = $this->dbh->prepare("INSERT INTO t_ingredients(id_ingredient,ingredient_nom varcha,ingredient_est_sucre,categorie_type) VALUES (:nom, :estSucre, :genre)");
    $result =$sth->execute($ingredientInput);
    if($result == true){
      print "true";
    }else{
      var_dump($this->dbh->errorInfo());
    }
    return $sth;
  }
  /*DELETE */
  function deleteRestaurants($deleteRestaurant_id){
    $deleteRestaurantsInput= [
      'id_restaurant' => $deleteRestaurant_id,
    ];
    $sth = $this->dbh->prepare("DELETE FROM t_restaurants WHERE id_restaurant = :id_restaurant");
    $result =$sth->execute($deleteRestaurantsInput);
    if($result == true){
      return true;
    }else{
      return $this->dbh->errorInfo();
    }
    return $sth;
  }
  /* UPDATE*/
  function updateRestaurants($updateRestaurant_id, $updateRestaurant_nom,$updateRestaurant_pays, $updateRestaurant_type){
    $updateRestaurantsInput= [
      'id' => $updateRestaurant_id,
      'nom' => $updateRestaurant_nom,
      'pays' => $updateRestaurant_pays,
      'type' => $updateRestaurant_type,
    ];
    
    var_dump($updateRestaurantsInput);
    $sth = $this->dbh->prepare("UPDATE t_restaurants SET restaurant_nom = :nom, restaurant_pays = :pays, restaurant_type = :type WHERE id_restaurant = :id");
    $result =$sth->execute($updateRestaurantsInput);
    var_dump($sth);
    if($result === true){
      return true;
    }else{
      return $this->dbh->errorInfo();
    }
  }
/* OPTIONS FORM */
  function restaurant_typeOption(){
    $sth = $this->dbh->prepare("SHOW COLUMNS FROM  t_restaurants WHERE field='restaurant_type'");
    $result =$sth->execute();
    if($result === true){
      $all = $sth->fetch(PDO::FETCH_ASSOC);
      $type = $all["Type"];
      $comaSeparated = explode("','",substr($type, 6, -2));
      return $comaSeparated;
    }else{
      print_r("ERROR");
      return $this->dbh->errorInfo();
    }
  }
}




/*
    $updateRestaurantsInput= array(
      $updateRestaurant_nom,$updateRestaurant_pays, $updateRestaurant_type,$updateRestaurant_id
    );


  function addIngredients(){
    $input= [
      'nom' => $ingredient_nom,
      'estSucre' => $ingredient_est_sucre,
      'genre' => $categore_type,
    ];
    $sth = $this->dbh->prepare("INSERT INTO t_ingredients(id_ingredient,ingredient_nom varcha,ingredient_est_sucre,categorie_type) VALUES (:nom, :estSucre, :genre)");
    $result =$sth->execute($data);
    if($result == true){
      print "true";
    }else{
      var_dump($this->dbh->errorInfo());
    }
    return $sth;
  }
}
*/

