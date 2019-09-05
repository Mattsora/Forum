<?php
require 'config.php';
//This is the script for polling search results 
$search =  $_GET['searchBar'];
echo var_dump($search);
$sql = "SELECT * FROM posts WHERE postTitle LIKE '{$search}%'";
$postquery = $db->query($sql);
$result = $postquery->fetchAll(PDO::FETCH_ASSOC);
echo var_dump($result);
?>