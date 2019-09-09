<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 16-4-2019
 * Time: 10:17
 */

require 'config.php';
require 'header.php';

$sql = "SELECT topics.topicSubject, categories.categoryName, users.username, posts.postTitle, posts.postContent, 
FROM topics
INNER JOIN categories
ON topics.topicCategory = categories.categoryID
INNER JOIN posts
ON posts.postTopic = topics.topicId
INNER JOIN users
ON topics.topicBy = users.id";
$query = $db->query($sql);
$bigquery = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<main>
    <div class="masthead">
<div class="container">
    <div class="section">
           <div class="table-responsive">
               <?php


               foreach($bigquery as $smallquery)
                {
                    echo "<div class='section'>";
                    echo "<h2>{$smallquery['categoryName']} </h2>";


                    foreach($bigquery as $smallquery)
                {
                    if($smallquery['topicCategory'] == $smallquery['categoryID'])
                    {
                    echo "<div class= 'cta'>";
                    $topicSubject = htmlentities($smallquery['topicSubject']);
                    $topicId = htmlentities($smallquery['topicId']);
                    echo "<h4><a href='topics.php?categoryID=$categoryID?topicId=$topicId'>{$topicSubject}</a> </h4>";
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
