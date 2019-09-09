<?php
require 'config.php';
$victim =  $_GET['postId'];
$sql = "SELECT * FROM posts";

if($victim == null)
{
    header( "Location: index.php" );
 
}
else 
{
    $sql ="  DELETE FROM posts WHERE postID = $victim";
    $query = $db->query($sql);
    header( "Location: index.php" );
    
}
?>