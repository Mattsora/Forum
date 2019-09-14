<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 16-4-2019
 * Time: 10:17
 */

require 'config.php';
require 'header.php';



$sql = "SELECT * FROM categories";
$query = $db->query($sql);
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM topics";
$query = $db->query($sql);
$topics = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM users";
$userquery = $db->query($sql);
$users = $userquery->fetchAll(PDO::FETCH_ASSOC);

?>
  <div class="masthead">
    <div class="container">
      <div class="section">
        <div class="table-responsive">
          <div class="custom-container">
<form action="categoryController.php" method="POST">
      <input type="hidden" name="type" value="createCategory">


      <div class="formPostTitle">
        <label for="categoryName"><b>Category Title</b></label>
        <input type="text" placeholder="Enter the title of your Category" name="categoryName" required>
      </div>
      <div class="formPostContent">
        <label for="categoryDesc"><b>Category Description</b></label>
        <input type="text" placeholder="Enter your category description" name="categoryDesc" required>
      </div>
      <input type="submit" value="Create category">
    </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <?php

require 'footer.php';

?>
