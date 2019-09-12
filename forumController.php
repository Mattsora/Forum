<?php

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST'){
  header('Location: index.php');
  exit;
}

/* if ($_POST['type'] == 'createPost') {

  $sql = "SELECT * FROM posts";
  $query = $db->query($sql);
  $posts = $query->fetch(PDO::FETCH_ASSOC);

  $sql = "SELECT * FROM topics";
  $query = $db->query($sql);
  $topics = $query->fetch(PDO::FETCH_ASSOC);

  $sql = "SELECT * FROM categories";
  $query = $db->query($sql);
  $categories = $query->fetch(PDO::FETCH_ASSOC);

  $sql = "SELECT * FROM users";
  $query = $db->query($sql);
  $users = $query->fetch(PDO::FETCH_ASSOC);

  $postContent = $_POST['postContent'];
  //$postBy = $_SESSION['id'];

  $postTopic = 1;
  $topicCategory = 1;
  $postBy = 1;
  $topicBy = 1;
  $postTitle = $_POST['postTitle'];

  var_dump($postBy);

  $postBy == $_SESSION['id'];

  $sql = "INSERT INTO posts (postTitle, postContent, postTopic, postBy) 
VALUES (:postTitle, :postContent, :postTopic, :postBy)";
  $prepare = $db->prepare($sql); //protect against sql injection
  $prepare->execute([
    ':postTitle' => $postTitle,
    ':postContent' => $postContent,
    ':postTopic' => $postTopic,
    'postBy' => $postBy
  ]);


  header('Location: index.php');
  exit;
}
*/

if ($_POST['type'] == 'createPost') {

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

 // $postID = $posts['postID'];
  $postContent = $_POST['postContent'];
  $topicCategory = $topicId['topicCategory'];
  $userID = $_SESSION['id'];
  $postBy = $userID;
  $topicBy = $userID;
  $postTopic = $topicId;
  $postTitle = $_POST['postTitle'];

  $sql = "INSERT INTO posts (postTitle, postContent, postTopic, postBy)
VALUES (:postTitle, :postContent, :postTopic, :postBy)";
  $prepare = $db->prepare($sql); //protect against sql injection
  $prepare->execute([
      ':postTitle' => $postTitle,
      ':postContent' => $postContent,
      ':postTopic' => $postTopic['topicId'],
      ':postBy'=> $postBy
  ]);


  header('Location: index.php');
  exit;
}


?>
