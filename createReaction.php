<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 16-4-2019
 * Time: 10:17
 */

require 'config.php';
require 'header.php';
$sql = "SELECT * FROM posts";
$query = $db->query($sql);
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM categories";
$query = $db->query($sql);
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM topics";
$query = $db->query($sql);
$topics = $query->fetchAll(PDO::FETCH_ASSOC);

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

?>
<div class="masthead">
<div class="container">
  <div class="createPost">
    <div class="custom-container">
    <form action="reactionController.php<?php echo"?postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}"?>" method="POST">
      <input type="hidden" name="type" value="createReaction">


      <div class="formPostTitle">
        <label for="reactionTitle"><b>Reaction Title</b></label>
        <input type="text" placeholder="Enter the title of your reaction" name="reactionTitle" class="form-control" required>
      </div>
      <div class="formPostContent">
        <label for="reactionContent"><b>Reaction Content</b></label>
        <input type="text" placeholder="Enter your post description" name="reactionContent" class="form-control" required>
      </div>
      <input type="submit" class="button" value="Create reaction">
    </form>
  </div>
  </div>
</div>
</div>

<?php

require 'footer.php';

?>
