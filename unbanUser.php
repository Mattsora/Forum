<?php
require 'config.php';

if (isset($_GET['id'])) {
    $tempID= $_GET['id'];}
    //echo $tempID;

    $query = "UPDATE users SET userlevel = 0 WHERE id = $tempID;";
    $db->query($query);

    header( "Location: adminPage.php" );
?>