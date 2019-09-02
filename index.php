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
<main>
    <div class="masthead">
<div class="container">
    <div class="section">
           <div class="table-responsive">
               <?php
               
               
               foreach($categories as $category) 
                {
                    echo "<div class='section'>";
                    echo "<h2>{$category['categoryName']} </h2>";
                    echo "<p><em>{$category['categoryDesc']}</em></p>";
                    foreach($topics as $topic) 
                {
                    if($topic['topicCategory'] == $category['categoryID'])
                    {
                    echo "<div class= 'cta'>";
                    echo "<h4>{$topic['topicSubject']} </h4>";
                    foreach($posts as $post)
                    {
                        if($post['postTopic'] == $topic['topicId'])
                        {
                                
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
                        }
                    }
                    echo "</div>";
                    }
                } ;
                    echo "</div>";
                } ;
                
            
               ?>
           
               
           </div>
    </div>
    </div>
            </div>
<?php
require 'footer.php';
?>