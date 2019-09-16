<?php
require 'config.php';

//This is the script for polling search results 
$upID =  $_GET['reactionID'];
$postID = $_GET['postID'];
$topicId = $_GET['topicId'];
$categoryID = $_GET['categoryID'];
$sql = "UPDATE reactions SET reactionKarma = reactionKarma +1 WHERE reactionID =$upID";

$postquery = $db->query($sql);

header( "Location: posts.php?postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}" );
?>