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
  <link href="css/new-age.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/new-age.css">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <!-- Title for top-left home-button -->
    <a class="navbar-brand js-scroll-trigger" href="index.php">The Champions Club</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
             <!-- Title for Second button -->
<?php
if(isset($_SESSION['id'])){
    echo
    '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php">Logout</a></li>
               
                
                <li class="nav-item">
                <!-- Title for Fourth Button -->
                <a class="nav-link js-scroll-trigger" href="adminPage.php">Admin Overview</a>
                </li>';
}else {
    echo
    '<div class="register-or-login">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Login</a></li>
                
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="register.php">Register</a></li>
                
                
                <li class="nav-item">
                <!-- Title for Fourth Button -->
                <a class="nav-link js-scroll-trigger" href="adminPage.php">Admin Overview</a>
                </li>
     </div>';
}
    ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navigation End -->

	<main>
