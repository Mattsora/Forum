<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    die('no post?');
    header('location: index.php');
    exit;
}


if ( $_POST['type'] === 'login' ) {

  $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
  $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

  $sql = "SELECT * FROM users  WHERE email = :email";
  $stmt = $db->prepare($sql);

  $stmt->bindValue(':email', $email);

  $stmt->execute();
    
  $user = $stmt->fetch(PDO::FETCH_ASSOC);



  if($user === false){

    header("refresh:5; url=https://jaibreyonlourens.nl/Project-Fifa-PHP/login.php");
    die(' Gebruikersnaam óf Wachtwoord verkeerd ingevoerd. U word na 5 seconden teruggestuurd');

  } else{

    $validPassword = password_verify($passwordAttempt, $user['password']);

    if($validPassword){
      
      $_SESSION['id'] = $user['id'];
      $_SESSION['is_Admin'] = $user['is_Admin'];
      $_SESSION['logged_in'] = time();

      header('Location: index.php');
      exit;

    } else{

        header("refresh:5; url=https://jaibreyonlourens.nl/Project-Fifa-PHP/login.php");
        die(' Gebruikersnaam óf Wachtwoord verkeerd ingevoerd. U word na 5 seconden teruggestuurd');
    }
  }
}

if ($_POST['type'] === 'register') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];


    try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit($e->getMessage());
    }

    if (isset($_POST['submit'])) {

        try {
            $stmt = $conn->prepare('SELECT username FROM users WHERE username = ?');
            $stmt->bindParam(1, $_POST['username']);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }



        if ($stmt->rowCount() > 0) {
            echo "Your username already exists";
        } else {
            echo "Your email does not exist yet";
        }
        if (empty($_POST["username"])) {
            $emailErr = "Username is required.";
        } else {
            $email = test_input($_POST["username"]);
        }

    }
    /*  if (isset($_POST['submit'])) {

          try {
              $stmt = $conn->prepare('SELECT username FROM users WHERE username = ?');
              $stmt->bindParam(1, $_POST['username']);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

              }
          } catch (PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
          }

          if ($stmt->rowCount() > 0) {
              echo "username exists already";
          } else {
              echo "username doesn't exist yet";
          }

      }

      if (trim($_POST['password']) == '' || trim($_POST['passwordConfirm']) == '') {
          echo('All fields are required!');
      } /* else if ($_POST['password'] != $_POST['passwordConfirm']) {
          echo('Passwords do not match!');
      } else if ($_POST['password'] == $_POST['passwordConfirm']) {
          $errors = array(); */



        if (strlen($password) < 7 || strlen($password) > 16) {
            $errors[] = "The password must be at least 7 characters and maximum 16 characters. You will be redirected in 5 seconds...";
        }
        if (!preg_match("/\d/", $password)) {
            $errors[] = "The password needs at least one number. You will be redirected in 5 seconds...";
        }
        if (!preg_match("/[A-Z]/", $password)) {
            $errors[] = "The password needs at least one UPPERCASE character. You will be redirected in 5 seconds...";
        }
        if (!preg_match("/[a-z]/", $password)) {
            $errors[] = "The password needs at least one lowercase character. You will be redirected in 5 seconds...";
        }
        if (strlen($username) < 6 || strlen($username) > 16) {
        $errors[] = "The username must at least be 6 characters and maximum 16 characters. You will be redirected in 5 seconds...";
        }
        function confirmthepasswords($password,$confirmpassword)
        {

        $passwordOK = "";

        if($password == $confirmpassword)
        {
            $passwordOK = $password;
        }
        else {
            $errors[] = "The passwords do not match. You will be redirected in 5 seconds...";
        }
        return $passwordOK;
        }

        confirmthepasswords($password, $confirmpassword);
        if ($password != $confirmpassword) {
            $errors[] = "The passwords do not match. You will be redirected in 5 seconds...";
        }

        if ($errors) {
            foreach ($errors as $error) {
                echo $error . "\n";
            }
            header("refresh:5; url=register.php");
    
            die();
        } else {
            header('location: register.php');
        }

        $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

        $sql = "INSERT INTO users (username, password) 
                     VALUES (:username, :password)";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':username'         => $username,
            ':password'      => $passwordHash
        ]);
   /* } */
}
exit;





