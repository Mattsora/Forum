<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 16-4-2019
 * Time: 10:17
 */

require 'config.php';
require 'header.php';
$sql = "SELECT * FROM POSTS";
$query = $db->query($sql);
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM categories";
$query = $db->query($sql);
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="category">
        <h3>Here comes the category<br><br>
           <?php
                var_dump($categories);
               echo "<h3>{$categories['categoryName']['categoryID']} </h3>";

           ?>
            <br> <br>
        </h3>
    </div>
    <div class="subs-ubject">
        <h4>Here comes the subsubject title</h4>
    </div>
    <div class="posts">
        <div class="post-topic">
            <h5>Here comes the post topic</h5>
        </div>
        <div class="post-description">
            <p>Here comes the post description</p>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>