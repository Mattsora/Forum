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
$topquery = $db->query($sql);
$topics = $topquery->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM posts";
$postquery = $db->query($sql);
$posts = $postquery->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM users";
$userquery = $db->query($sql);
$users = $userquery->fetchAll(PDO::FETCH_ASSOC);

?>
<main>
    <div class="masthead">
<div class="container">
    <div class="section">
           <div class="table-responsive">
               <?php
               
               
               foreach($users as $user) 
                {
                    echo "<div class='section'>";
                    echo "<h2>{$user['username']} </h2>";
                    if($user['userlevel'] == 666)
                    {
                        $tempID = $user['id'];
                        echo "<h4>Level : Admin </h4>";
                        echo '<a href =revokeUser.php?id='.$tempID.'>Revoke Admin Rights</a>';
                       
                    }
                    else 
                    {
                        $tempID = $user['id'];
                        echo "<h4>Level : User </h4>";
                        echo '<a href =updateUser.php?id='.$tempID.'>Give Admin Rights</a>'; 
                    }
                    
                   
                    echo "</div>";
                };
                
               
            
               ?>
           
               
           </div>
           
     </div>

    </div>
           
</div>
<?php
require 'footer.php';
?>