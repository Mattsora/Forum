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
?>
<div class="masthead">
<div class="container">
  <div class="createPost">
    <form action="forumController.php" method="post">
      <input type="hidden" name="type" value="createPost">
      <div class="categorySubject">
        <?php foreach ($categories as $category) {
          echo "<h4> {$category['categoryName']}</h4> ";
        }
        ?>
      </div>
      <div class="formPostTopicSubject">
        <label for="topicSubject"><b>Topic Subject</b></label>
        <select name="topicSubject" id="topicSubject">
          <?php

            foreach ($topics as $topic)

              echo "<option value='{$topic['topicSubject']}'> {$topic['topicSubject'] } </option>";
            ?>
        </select>
      </div>
      <div class="formPostTitle">
        <label for="postTitle"><b>Post Title</b></label>
        <input type="text" placeholder="Enter the title of your post" name="postTitle" required>
      </div>
      <div class="formPostContent">
        <label for="postContent"><b>Post Content</b></label>
        <input type="text" placeholder="Enter your post description" name="postContent" required>
      </div>
      <input type="submit" value="Create post">
    </form>
  </div>
</div>
</div>

<?php

require 'footer.php';

?>
