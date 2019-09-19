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
?>
<div class="masthead">
<div class="container">
  <div class="createPost">
    <form action="forumController.php<?php echo"?topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}"?>" method="post">
      <input type="hidden" name="type" value="createPost">



      <?php

        echo "<div class='custom-container'><b> <h4> Creating post in: </h4>
           {$topicId['topicSubject']}</b><br><br>";

      /*
      echo "<select>";
      foreach ($topics as $topic) {
        echo "<option value={$topic['topicId']}>{$topic['topicSubject']}</option>";
      }
      echo "</select>";
      */
      ?>


      <div class="formPostTitle">
        <label for="postTitle"><b>Post Title</b></label>
        <input type="text" placeholder="Enter the title of your post" name="postTitle" class="form-control" required>
      </div>
      <div class="formPostContent">
        <label for="postContent"><b>Post Content</b></label>
        <input type="text" placeholder="Enter your post description" name="postContent" class="form-control" required>
      </div>
      <input type="submit" value="Create post" class="button">
    </form>
  </div>
</div>
</div>
</div>

<?php

require 'footer.php';

?>
