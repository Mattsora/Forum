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
$posts = $query->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM categories";
$query = $db->query($sql);
$categories = $query->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM topics";
$query = $db->query($sql);
$topics = $query->fetch(PDO::FETCH_ASSOC);
?>
<div class="masthead">
<div class="container">
  <div class="createPost">
    <form action="forumController.php" method="post">
      <input type="hidden" name="type" value="createPost">
      <div class="formPostTitle">
        <label for="postTitle"><b>Post Title</b></label>
        <input type="text" placeholder="Enter the title of your post" name="postTitle" required>
      </div>
      <div class="formPostDescription">
        <label for="postDescription"><b>Post Description</b></label>
        <input type="text" placeholder="Enter your post description" name="postDescription" required>
      </div>
      <input type="submit" value="createPost">
    </form>
  </div>
</div>
</div>

<?php

require 'footer.php';

?>
