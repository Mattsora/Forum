<?php
require 'config.php';
require 'header.php';
require 'dev.lib.php';



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

$sql = "SELECT * FROM users";
$userquery = $db->query($sql);
$users = $userquery->fetchAll(PDO::FETCH_ASSOC);



$sql = "SELECT * FROM posts 
INNER JOIN reactions 
ON posts.postID = reactions.reactionPost

INNER JOIN users
ON users.id = reactions.reactionBy

WHERE postID = :postID";
$prepare =  $db->prepare($sql);
$prepare->execute([
    ':postID' => $_GET['postID']
]);
$reactions = $prepare->fetchAll( PDO::FETCH_ASSOC);

$sql = "SELECT * FROM posts";
$postquery = $db->query($sql);
$posts = $postquery->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
  <div class="masthead">
    <div class="container">
      <div class="section">
      <div class="custom-container">
        <div class="table-responsive">
          <?php
          if(!isset($_SESSION['id'])){
            echo "Please <a href='register.php'> Register</a>  or <a href='login.php'> Login </a>.";
          }
          else {

            echo "<div class='topicTitleSection'>";
            echo "<h2>{$categoryID['categoryName']}</h2>";
            echo "<h3><em>{$topicId['topicSubject']}</em></h3>";
            echo "</div>"; /* end of topictitlesection */
            echo "<div class='postTitleSection'>";
            echo "<h4>{$postID['postTitle']}";
            echo "</div>"; /* end of postTitleSection */
            echo "<div class='postContentSection'>";
            echo "<p>{$postID['postContent']}</p>";
            foreach ($users as $user) {
              if ($postID['postBy'] == $user['id']) {
                echo "<em> By : {$user['username']} </em>";
              }
            }
            if (isset($_SESSION['id'])) {
              $userID = $_SESSION['id'];

              foreach ($posts as $post) {
                if ($post['postID'] == $postID['postID']) {
                  $testerVar = $post['postBy'];
                }
              }
              if ($userID == $testerVar) {
                echo "<a href = 'postDelete.php?postId={$post['postID']}'><h4> Remove post?</h4></a>";
              }

            }


            echo "<br> <br> <br>";
           // echo "<div class='reactionSection'>";
            if (isset($_SESSION['id'])) {
              echo "<a href='createReaction.php?postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'>Write a comment</a> <br>";
            }
            foreach ($reactions as $reaction) {
              if ($postID['postID'] == $reaction['reactionPost']) {
                echo "<div class='reactionSection'>";
                echo "{$reaction['reactionTitle']}<br>";
                echo "{$reaction['reactionContent']}<br>";
                echo "<em> By : {$reaction['username']} <br></em>";
              //  echo "</div>";
              }

            }


            echo "</div>"; /*end of reaction section*/

            echo "</div>";
            echo "</div>"; /*end of table-responsive */
            echo "</div>"; /* end of section*/
          }
          ?>
</div>
      </div> <!-- end of container -->
    </div> <!-- end of masthead -->
</main>

<?php
require 'footer.php';
?>
