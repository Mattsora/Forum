<?php
require 'config.php';
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

$sql = "SELECT * FROM posts WHERE postID = :postID";
$prepare =  $db->prepare($sql);
$prepare->execute([
  ':postID' => $_GET['postID']
]);
$postID = $prepare->fetch(PDO::FETCH_ASSOC);

require 'config.php';
$victim = $_GET['reactionID'];
$sql = "SELECT reactions.reactionID FROM reactions";

if ($victim == null) {
  header("Location: index.php");

} else {
  $sql = "DELETE FROM reactions WHERE reactionID = $victim";
  $query = $db->query($sql);
  header("Location: posts.php?postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}");

}
