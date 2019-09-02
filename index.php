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

?>
<main>
	<div class="container">
    <div clas="subject-section">
           <div class="subject-grid">
               <?php
               
               
               foreach($categories as $category) 
                {
                    echo "<div class='category'>";
                    echo "<h3>{$category['categoryName']} </h3>";
                    echo "<p><em>{$category['categoryDesc']}</em></p>";
                    foreach($topics as $topic) 
                {
                    if($topic['topicCategory'] == $category['categoryID'])
                    {
                    echo "<div class='topic'>";
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
                                echo "<p>{$postPreview} </p>";
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
<?php
require 'footer.php';
?>