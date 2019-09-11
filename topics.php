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

?>

<main>
  <div class="masthead">
    <div class="container">
      <div class="section">
          <div class="custom-container">
        <div class="table-responsive">
          <?php



               echo "<div class='section'>";
                  echo "<div class='topicTitleSection'>";
                    echo "<h2>{$categoryID['categoryName']}</h2>";
                    echo "<h3><em>{$topicId['topicSubject']}</em></h3>";
                  echo "</div>";
                  echo "<div class='postTitleSection'>";

                    foreach ($posts as $post)
                    if ($post['postTopic'] == $topicId['topicId']) {
                      echo "<h4> <a href='posts.php?postID={$post['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}'>{$post['postTitle']}</a></h4>";
                      echo "</div>";
                      echo "<div class='postContentSection'>";



                          $postPreview = $post['postContent'];
                          if(strlen($postPreview)>64)
                          {
                            $postPreview = substr($postPreview,0,64);
                            $postPreview = $postPreview.= "...";
                          }
                          echo "<div class='cta-content'>";
                          echo "<p>{$postPreview}</p>";
                          foreach($users as $user)
                          {
                            if($post['postBy'] == $user['id'])
                            {
                              echo "<p><em> By : {$user['username']} </em></p>";
                            }
                          }

                          echo "</div>";


                      echo "</div>";

                      echo "</div>";
                     /* echo "<div class='reactionSection'>";
                      foreach ($users as $user) {
                         if ($post['postBy'] == )
                    }
                      echo "</div>";*/

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
