<?php
require 'config.php';
session_start();
if ( $_POST['type'] === 'login' ) {
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':username', $username);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user === false){
        header("refresh:5; url = http://localhost/Forum%20Project/login.php");
    die(' Gebruikersnaam óf Wachtwoord verkeerd ingevoerd. U word na 5 seconden teruggestuurd');
    }else {
        //Alleen bij gehashde passwords
        $validPassword = password_verify($passwordAttempt, $user['password']);


        if ($validPassword) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user['id'];
            $_SESSION['userlevel'] = $user['userlevel'];
            $_SESSION['accountstatus'] = time();

            header('Location: index.php');

            exit;

        } else {
            header("refresh:5; url = http://localhost/Forum%20Project/login.php");
            die(' Gebruikersnaam óf Wachtwoord verkeerd ingevoerd. U word na 5 seconden teruggestuurd');
        }
    }
}