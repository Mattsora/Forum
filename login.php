<?php
require 'config.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="loginController.php">
    <input type="hidden" name="type" value="login">
    <div class="form-group">
        <label for="username"><b>Username</b></label>
        <input type="username" placeholder="Enter your Username" name="username" required>
    </div>

    <div class="form-group">
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter your password" name="password" required>
    </div>
    <input type="submit" value="login">
</form>
</body>
</html>

