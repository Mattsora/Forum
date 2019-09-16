<?php
require 'config.php';

//This is the script for polling search results 
$upID =  $_GET['postId'];
$topicId = $_GET['topicId'];
$categoryID = $_GET['categoryID'];
$sql = "UPDATE posts SET postKarma = postKarma -1 WHERE postID =$upID";

$postquery = $db->query($sql);

header( "Location: posts.php?postID={$upID}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}" );
?>