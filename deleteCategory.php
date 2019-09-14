<?php

require 'config.php';
$victim = $_GET['categoryID'];
$sql = "SELECT categories.categoryID FROM categories";

if ($victim == null) {
  header("Location: index.php");

} else {
  $sql = "  DELETE FROM categories WHERE categoryID = $victim";
  $query = $db->query($sql);
  header("Location: index.php");

}
