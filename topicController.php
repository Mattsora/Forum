<?php

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST'){
  header('Location: index.php');
  exit;
}

$sql = "SELECT * FROM topics";
$query = $db->query($sql);
$topics = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM categories WHERE categoryID = :categoryID";
$prepare =  $db->prepare($sql);
$prepare->execute([
  ':categoryID' => $_GET['categoryID']
]);
$categoryID = $prepare->fetch(PDO::FETCH_ASSOC);

if ($_POST['type'] == 'createTopic') {

  $userID = $_SESSION['id'];
  $topicBy = $userID;
  $topicSubject = $_POST['topicSubject'];
  $topicCategory = $categoryID;

  $sql = "INSERT INTO topics (topicSubject, topicBy, topicCategory)
VALUES (:topicSubject, :topicBy, :topicCategory)";
  $prepare = $db->prepare($sql); //protect against sql injection
  $prepare->execute([
    ':topicSubject' => $topicSubject,
    ':topicBy' => $topicBy,
    ':topicCategory' => $topicCategory['categoryID']
  ]);
  header('Location: index.php');
}
?>
