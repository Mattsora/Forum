<?php
require 'config.php';
require 'header.php';
?>

<div class="masthead">
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
</div>
<?php
require 'footer.php';
?>