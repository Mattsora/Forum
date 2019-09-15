<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 16-4-2019
 * Time: 10:17
 */

require 'config.php';
require 'header.php';


$sql = "SELECT * FROM categories";
$query = $db->query($sql);
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM topics";
$topquery = $db->query($sql);
$topics = $topquery->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM posts";
$postquery = $db->query($sql);
$posts = $postquery->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM users";
$userquery = $db->query($sql);
$users = $userquery->fetchAll(PDO::FETCH_ASSOC);

?>

  <div class="masthead">
    <div class="container">
      <div class="section">
        <div class="table-responsive">
        <div class="custom-container">
          <?php
          if(!isset($_SESSION['id'])){
            echo "This forum is under construction.<br>";
            echo "Please <a href='register.php'> Register</a> if you have no account,  or <a href='login.php'> Login </a> to use the forum. <br>It is free to make an account.";
            }
          else {
            echo "This forum is under construction.";
            echo "<h3><a href='createCategory.php'> Create Category? </a></h3>";





            foreach ($categories as $category) {

              echo "<div class='section'>";
              echo "<div class='categorySection'>";
              echo "<h2>{$category['categoryName']}<p><a href='deleteCategory.php?categoryID={$category['categoryID']}'>Delete Category?</a></p> </h2>";
              echo "<p><em>{$category['categoryDesc']}</em></p>";
              echo "<h5><a href='createTopic.php?categoryID={$category['categoryID']}'> Create Topic in: {$category['categoryName']}?</h5></a> ";
              foreach ($topics as $topic) {

                if ($topic['topicCategory'] == $category['categoryID']) {
                  echo "<div class= 'cta'>";

                  echo "<h4><a href='topics.php?topicId={$topic['topicId']}&categoryID={$category['categoryID']}'>{$topic['topicSubject']}</a> 
                    <p><a href='deleteTopic.php?topicId={$topic['topicId']}'>Delete Topic?</a></p></h4>";

                  echo "</div>";
                }
              };

              echo "</div>";
            };

          }
          ?>

</div>
        </div>
      </div>
    </div>
  </div>
<?php
require 'footer.php';
?>
