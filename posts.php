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

$banned = false;


$sql = "SELECT * FROM posts 
INNER JOIN reactions 
ON posts.postID = reactions.reactionPost

INNER JOIN users
ON users.id = reactions.reactionBy

WHERE postID = :postID
ORDER BY `reactions`.`reactionKarma` DESC ";
$prepare =  $db->prepare($sql);
$prepare->execute([
    ':postID' => $_GET['postID']
]);
$reactions = $prepare->fetchAll( PDO::FETCH_ASSOC);



$sql = "SELECT * FROM posts";
$postquery = $db->query($sql);
$posts = $postquery->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM nametags";
$namequery = $db->query($sql);
$nametags = $namequery->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM `reactions`
INNER JOIN posts
ON reactions.reactionPost = posts.postID
WHERE postID = :postID 
ORDER BY `reactions`.`reactionKarma` DESC ";
// var_dump($sql); die; 
$prepare =  $db->prepare($sql);
$prepare->bindParam(':postID', $_GET['postID']);
$prepare->execute();

$karma = $prepare->fetchAll(PDO::FETCH_ASSOC);
// var_dump($karma); die;

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
              foreach ($posts as $post)
              {
                if($post['postID'] == $_GET['postID'])
                {
                echo '<h4> Rating : '; echo $post['postKarma']; echo '</h4>';
                }
              }
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
            if($postID['postKarma'] > 9 && $postID['postKarma'] < 19 )
            {
              $nametag = $nametags[0];
              echo "<div class= 'karma-nametag'><h3> {$nametag['nametagName']} </h3></div>";
            }
            else
            {
              if($postID['postKarma'] > 18)
              {
                $nametag = $nametags[1];
              echo "<div class= 'karma-nametag'><h3> {$nametag['nametagName']} </h3></div>";
              }
            }
            if (isset($_SESSION['id'])) {
              $userID = $_SESSION['id'];

              foreach ($posts as $post) {
                if ($post['postID'] == $postID['postID']) {
                  $testerVar = $post['postBy'];

                      echo '<div class= "section">';
                      echo '<div class= "container">';
                        echo '<div class = btn-outline>';
                          echo "<a href = 'postUpvote.php?postId={$post['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'&{$post['postTitle']}><h4>Upvote</h4></a>";
                        echo '</div>';
                        echo '<div class = btn-outline>';
                          echo "<a href = 'postDownvote.php?postId={$post['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'&{$post['postTitle']}><h4>Downvote</h4></a>";
                        echo '</div>';
                        echo '</div>';
                      echo '</div>';
                }
              }
              if ($userID == $testerVar) {
                echo "<a href = 'postDelete.php?postId={$post['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'><h4> Remove post?</h4></a>";
              }

            }


            echo "<br> <br> <br>";
           // echo "<div class='reactionSection'>";
            if (isset($_SESSION['id'])) {
              echo "<a href='createReaction.php?postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'>Write a comment</a> <br>";
            }




            echo "<div class='reactionSection'>";
            echo "<h2>Best reaction:</h2><br>";
            
            if (@$karma[0]['reactionKarma'] == 0){
              echo "there is no best reaction yet... rate one now!";
            }
            else  {
          echo "{$karma[0]['reactionTitle']}<br>";
          echo "{$karma[0]['reactionContent']}<br>";

            }
          
          
            echo "</div> ";


            foreach ($reactions as $reaction) {
              //$value = max($reaction['reactionKarma']);
              //$key = array_search($value, $reaction['reactionKarma']);
              //echo "{$key['reactionContent']}";



              if ($postID['postID'] == $reaction['reactionPost']) {
                echo "<div class='reactionSection'>";
                if ($reaction['reactionBy'] == $postID['postBy']){
                  echo "<div class='hightlight'>";
                  echo "<h5> Rating: {$reaction['reactionKarma']} </h5>";
                  
                  
                  

                  echo "{$reaction['reactionTitle']}<br>";
                  echo "{$reaction['reactionContent']}<br>";
                  echo "<a href ='reactionUpvote.php?reactionID={$reaction['reactionID']}&postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'&{$post['postTitle']}>Upvote</a><br>";
                  echo "<a href ='reactionDownvote.php?reactionID={$reaction['reactionID']}&postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'&{$post['postTitle']}>Downvote</a><br>";
                  
                  echo "<em> By : {$reaction['username']} <br></em>";
                  if($reaction['reactionKarma']  > 9 && $reaction['reactionKarma']  < 19 )
                {
                  $nametag = $nametags[0];
                  echo "<div class= 'karma-nametag'><h3> {$nametag['nametagName']} </h3></div>";
                }
                else
                {
                  if($reaction['reactionKarma']  > 18)
                  {
                    $nametag = $nametags[1];
                  echo "<div class= 'karma-nametag'><h3> {$nametag['nametagName']} </h3></div>";
                  }
                }
                  
                  if ($_SESSION['userlevel'] > 500) {
                    echo " <a href='deleteComment.php?reactionID={$reaction['reactionID']}&postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'> <p>Delete comment?</p> </a>";
                  }
                  echo "</div>";
                }
                else {
                echo '<h5> Rating : '; echo $reaction['reactionKarma']; echo '</h5>';
                echo "{$reaction['reactionTitle']}<br>";
                echo "{$reaction['reactionContent']}<br>";
                echo "<a href ='reactionUpvote.php?reactionID={$reaction['reactionID']}&postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'&{$post['postTitle']}>Upvote</a><br>";
                echo "<a href ='reactionDownvote.php?reactionID={$reaction['reactionID']}&postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'&{$post['postTitle']}>Downvote</a><br>";
                echo "<em> By : {$reaction['username']} <br></em>";


                foreach ($users as $user)
                  {
                    if($user['id'] == $reaction['reactionBy'])
                    {
                    if( $user['userlevel'] == -420)
                    {
                      $nametag = $nametags[3];
                      echo "<em><div ='karma-nametag'>{$nametag['nametagName']}<br></div></em>";
                    }
                    else
                    {
                      if($reaction['reactionKarma']>9 && $reaction['reactionKarma']<19 )
                      {
                        $nametagK = $nametags[0];
                        echo "<em><div ='karma-nametag'>{$nametagK['nametagName']}<br></div></em>";
                      }
                    }
                  }
                }

                if ($_SESSION['userlevel'] > 500) {
                echo " <a href='deleteComment.php?reactionID={$reaction['reactionID']}&postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'> <p>Delete comment?</p> </a>";
                  }
                }
                echo "</div>"; /*end of reaction section*/
              //  echo "</div>";
              }

            }




            echo "</div>";
            echo "</div>"; /*end of table-responsive */
            echo "<a href='topics.php?topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'> go back? </a>";
            echo "</div>"; /* end of section*/
          }
        }
          ?>
</div>
      </div> <!-- end of container -->
    </div> <!-- end of masthead -->
</main>

<?php
require 'footer.php';
?>
