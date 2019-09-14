<?php
require 'config.php';
if ($_POST['type'] == 'createCategory') {
  $sql = "SELECT * FROM categories";
  $query = $db->query($sql);
  $categories = $query->fetchAll(PDO::FETCH_ASSOC);

  $userID = $_SESSION['id'];
  $categoryBy = $userID;
  $categoryName = $_POST['categoryName'];
  $categoryDesc = $_POST['categoryDesc'];



  $sql = "INSERT INTO categories (categoryName, categoryDesc, categoryBy)
  VALUES (:categoryName, :categoryDesc, :categoryBy)";
    $prepare = $db->prepare($sql); //protect against sql injection
    $prepare->execute([
        ':categoryName' => $categoryName,
        ':categoryDesc' => $categoryDesc,
        ':categoryBy'=> $categoryBy
    ]);

    header('Location: index.php');
    exit;
}

