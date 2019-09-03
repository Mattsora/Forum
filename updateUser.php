<?php
require 'config.php';

if (isset($_GET['id'])) {
    $tempID= $_GET['id'];}
    echo $tempID;

$query = "UPDATE users SET userlevel = 666 WHERE id == 1";
    $db->query($query);
    header("adminPage.php");
?>