<?php


require 'config.php';
$victim = $_GET['topicId'];
$sql = "SELECT topics.topicId FROM topics";

if ($victim == null) {
  header("Location: index.php");

} else {
  $sql = "  DELETE FROM topics WHERE topicId = $victim";
  $query = $db->query($sql);
  header("Location: index.php");

}
