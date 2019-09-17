<?php
require 'config.php';
if ( $_POST['type'] === 'login' ) {
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':username', $username);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user === false){
     $errors[] = "Wrong username or password. You will be redirected in 5 seconds.";
      header("refresh:5; url=login.php");
      if ($errors) {
        foreach ($errors as $error) {
          echo $error . "\n";
        }
        header("refresh:5; url=login.php");

        die("Wrong username or password. You will be redirected in 5 seconds.");
      }
    }else {
        //Alleen bij gehashde passwords
        $validPassword = password_verify($passwordAttempt, $user['password']);


        if ($validPassword) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['userlevel'] = $user['userlevel'];
            $_SESSION['accountstatus'] = time();

            header('Location: index.php?login=success');

            exit;

        } else {

          header("refresh:5; url=login.php");
            die(' Wrong username or password. You will be redirected in 5 seconds.');
        }
    }
}
