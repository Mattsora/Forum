
<?php
require 'config.php';
if ($_POST['type'] == 'createReaction') {
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

 // $postID = $posts['postID'];

  $reactionTitle = $_POST['reactionTitle'];
  $reactionContent = $_POST['reactionContent'];
  $userID = $_SESSION['id'];
  $postBy = $userID;
  $reactionBy = $userID;
  $topicBy = $userID;
  $postTopic = $topicId;
  $reactionPost = $postID;
  $postTitle = $_POST['postTitle'];

  $sql = "INSERT INTO reactions (reactionTitle, reactionContent, reactionPost, reactionBy)
  VALUES (:reactionTitle, :reactionContent, :reactionPost, :reactionBy)";
    $prepare = $db->prepare($sql); //protect against sql injection
    $prepare->execute([
        ':reactionTitle' => $reactionTitle,
        ':reactionContent' => $reactionContent,
        ':reactionPost' => $reactionPost['postID'],
        ':reactionBy'=> $reactionBy
    ]);

    header("Location: posts.php?postID={$postID['postID']}&topicId={$topicId['topicId']}&categoryID={$categoryID['categoryID']}");
    exit;
}
?>
