<?php
require 'config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Champions Club Forum</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/main.css">
  <link href="css/new-age.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/new-age.css">

  <!-- logo links -->
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <!-- Title for top-left home-button -->
    <a class="navbar-brand js-scroll-trigger" name="logo" href="index.php"><img src="img/championsclub1.png" class="logo" alt="Logo"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <?php if(!isset($_SESSION['id'])){
            echo "";
            }
          else {
            echo"
    <form action = 'searchContent.php'>
      <input type='text' name = 'searchBar' placeholder='Search for a post' class='searchBar'>
      <button type = 'submit' name='searchbarButton' class='button'>Search</button>
    </form>";
    }
          ?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
             <!-- Title for Second button -->

<?php
if(isset($_SESSION['id'])){
    echo
    '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php">Logout</a></li>';
if ($_SESSION['userlevel'] > 500) {
  echo '      <li class="nav-item">
                <!-- Title for Fourth Button -->
                <a class="nav-link js-scroll-trigger" href="adminPage.php">Admin Overview</a>
                </li>';
}
}else {
    echo
    '<div class="register-or-login">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Login</a></li>
                
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="register.php">Register</a></li>
                
     </div>';
}
    ?>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/new-age.min.js"></script>
<!-- Navigation End -->

	<main>
