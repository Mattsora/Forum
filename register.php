<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 16-4-2019
 * Time: 10:17
 */

require 'config.php';
require 'header.php';

?>
<div class="masthead">
  <div class="container">
    <div class="section">
      <div class="table-responsive">
        <div class="custom-container">
            <div class="container">
                <div class="register">

                <h3>Register</h3>

                <form action="registerController.php" method="post">
                    <input type="hidden" name="type" value="register">
                        <div class="form-group">
                            <label for="username"><b>Username</b></label>
                            <input type="username" placeholder="Enter your Username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="Enter your password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword"><b>Confirm-password</b></label>
                            <input type="password" placeholder="Confirm your password" name="confirmpassword" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Register">
                        </div>

                </form> <!-- end of form action -->

                </div><!-- end of login -->
            </div><!-- end of container -->
</div>
      </div>
    </div>
  </div>
</div>

<?php
require 'footer.php';
?>
