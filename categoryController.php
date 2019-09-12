<?php 
require 'config.php';
if ($_POST['type'] == 'createCategory') {




  $reactionTitle = $_POST['reactionTitle'];
  $reactionContent = $_POST['reactionContent'];
  $userID = $_SESSION['id'];
  $postBy = $userID;
  $reactionBy = $userID;
  $topicBy = $userID;
  $postTopic = $topicId;
  $reactionPost = $postID;
  $postTitle = $_POST['postTitle'];
  $categoryBy = $userID;
  $categoryName = $_POST['categoryName'];
  $categoryDesc = $_POST['categoryDesc'];

  $sql = "INSERT INTO reactions (reactionTitle, reactionContent, reactionPost, reactionBy)
  VALUES (:reactionTitle, :reactionContent, :reactionPost, :reactionBy)";
    $prepare = $db->prepare($sql); //protect against sql injection
    $prepare->execute([
        ':reactionTitle' => $reactionTitle,
        ':reactionContent' => $reactionContent,
        ':reactionPost' => $reactionPost['postID'],
        ':reactionBy'=> $reactionBy
    ]);

    header('Location: index.php');
    exit;
}
?>