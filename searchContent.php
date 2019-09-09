<?php
require 'config.php';
require 'header.php';
//This is the script for polling search results 
$search =  $_GET['searchBar'];

$sql = "SELECT * FROM posts WHERE postTitle LIKE '{$search}%'";

$postquery = $db->query($sql);

$result = $postquery->fetchAll(PDO::FETCH_ASSOC);



$sql = "SELECT * FROM topics";
$topquery = $db->query($sql);
$topics = $topquery->fetchAll(PDO::FETCH_ASSOC);

?><main>
<div class="masthead">
  <div class="container">
    <div class="section">
      <div class="table-responsive">
        <?php
        if($result)
        {
            foreach($result as $post)
            {
            echo "<div class='section'>";
          
            $topicId = $post['postTopic'];
           
            foreach($topics as $topic)
            {
                if($topic['topicId'] == $post['postTopic'] )
                {
                    $categoryID = $topic['topicCategory'];
                }
            }

            echo "<h2><a href='posts.php?postID={$post['postID']}&topicId={$post['postTopic']}&categoryID={$categoryID}'>{$post['postTitle']}</a> </h2>";
            echo "<p><em>{$post['postContent']}</em></p>";
            
            echo "</div>";
            } ;
        }
        else 
        {
            echo '<h2>No results found for :'; echo $search; echo '</h2>' ;
        }
        require 'footer.php';
        ?>
      </div>
    </div>
  </div>
</div>