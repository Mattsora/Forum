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



$victim =  $_GET['postId'];
$sql = "SELECT posts.postID FROM posts";

if($victim == null)
{
    header( "Location: index.php" );

}
else
{
    $sql ="  DELETE FROM posts WHERE postID = $victim";
    $query = $db->query($sql);
    header( "Location: topics.php?topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}" );

}
?>
