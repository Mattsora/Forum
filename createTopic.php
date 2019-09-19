<?php
require 'config.php';
require 'header.php';

$sql = "SELECT * FROM topics";
$query = $db->query($sql);
$topics = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM categories WHERE categoryID = :categoryID";
$prepare =  $db->prepare($sql);
$prepare->execute([
  ':categoryID' => $_GET['categoryID']
]);
$categoryID = $prepare->fetch(PDO::FETCH_ASSOC);

?>
<div class="masthead">
  <div class="container">
    <div class="section">
      <div class="table-responsive">
        <div class="custom-container">
<form action="topicController.php<?php echo"?categoryID={$categoryID['categoryID']}"?>" method="POST">
  <input type="hidden" name="type" value="createTopic">
<div class="formPostTitle">
    <label for="topicSubject"><b>Topic Title</b></label>
    <input type="text" placeholder="Enter the title of your Topic" name="topicSubject" class="form-control" required>
  <input type="submit" value="Create Topic" class="button">
  </div>

  <?php
require 'footer.php';
?>
