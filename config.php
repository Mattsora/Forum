<?php

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'forum';

$db = new PDO(
	"mysql:host=$dbHost;dbname=$dbName", 
	$dbUser, 
	$dbPass
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//session_start();

?>