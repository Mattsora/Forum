<?php

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST'){
  header('Location: index.php');
  exit;
}

$sql = "SELECT * FROM categories WHERE categoryID = :categoryID";
$prepare =  $db->prepare($sql);
$prepare->execute([
  ':categoryID' => $_GET['categoryID']
]);
$categoryID = $prepare->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM topics WHERE topicId = :topicId";
$prepare =  $db->prepare($sql);
$prepare->execute([
  ':topicId' => $_GET['topicId']
]);
$topicId = $prepare->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM posts";
$postquery = $db->query($sql);
$posts = $postquery->fetchAll(PDO::FETCH_ASSOC);

if ($_POST['type'] == 'createPost') {

  $userID = $_SESSION['id'];
  $postTitle = $_POST['postTitle'];
  $postContent = $_POST['postContent'];
  $postBy = $userID;
  $postTopic = $topicId;

  $sql = "INSERT INTO posts (postTitle, postContent, postTopic, postBy)
VALUES (:postTitle, :postContent, :postTopic, :postBy)";
  $prepare = $db->prepare($sql); //protect against sql injection
  $prepare->execute([
      ':postTitle' => $postTitle,
      ':postContent' => $postContent,
      ':postTopic' => $postTopic['topicId'],
      ':postBy'=> $postBy
  ]);


  header('Location: index.php');
  exit;
}


?>
