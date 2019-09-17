<?php
require 'config.php';
require 'header.php';



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

$sql = "SELECT * FROM posts";
$postquery = $db->query($sql);
$posts = $postquery->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM users";
$userquery = $db->query($sql);
$users = $userquery->fetchAll(PDO::FETCH_ASSOC);

$banned = false;
?>

<main>
  <div class="masthead">
    <div class="container">
    <div class="custom-container">
      <div class="section">

        <div class="table-responsive">

          <?php

if(!isset($_SESSION['id'])){
            echo "Please <a href='register.php'> Register</a>  or <a href='login.php'> Login </a>.";
          }
          
else {
  foreach ($users as $user) {
    if ($user['id'] == $_SESSION['id']){
      if ($user['userlevel'] == -420){
        $banned = true;
      }
    }
  }
 
if ($banned == true){
  echo "<h4>You have been banned.</h4>";
}
else {
               echo "<div class='section'>";
                  echo "<div class='topicTitleSection'>";
                    echo "<h2>{$categoryID['categoryName']}</h2>";
                    echo "<h3><em>{$topicId['topicSubject']}</em></h3>";
                  echo "</div>";



            if (isset($_SESSION['id'])) {
              echo "<div class='createPostLink'>";
              echo "<a href='createPost.php?topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'>Create Post</a> ";
              echo "</div>";
            }
            echo "<div class='postTitleSection'>";

            foreach ($posts as $post)
              if ($post['postTopic'] == $topicId['topicId']) {
                echo "<div class='reactionSection'><h4> <a href='posts.php?postID={$post['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'>{$post['postTitle']}</a></h4>";

                echo "<div class='postContentSection'>";


                $postPreview = $post['postContent'];
                if (strlen($postPreview) > 64) {
                  $postPreview = substr($postPreview, 0, 64);
                  $postPreview = $postPreview .= "...";
                }
                echo "<div class='cta-content'>";
                echo "<p>{$postPreview}</p>";
                foreach ($users as $user) {
                  if ($post['postBy'] == $user['id']) {
                    echo "<p><em> By : {$user['username']} </em></p>";
                  }
                }

                echo "</div> </div>";


                echo "</div>";

                echo "</div>";
                /* echo "<div class='reactionSection'>";
                 foreach ($users as $user) {
                    if ($post['postBy'] == )
               }
                 echo "</div>";*/

              }

          }
        
          echo "<a href='index.php'> go back? </a>";
        }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
require 'footer.php';
?>
