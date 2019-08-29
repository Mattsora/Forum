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

<main>
    <h2>Dit is de index. :)</h2>
	<div class="container">
    <div clas="subject-section">
           <div class="subject-grid">
               <!--Main Subject Class--->
               <div class="main-subject">
                   
                   <div class="main-subject-title"><b>Main Subject</b></div>
                   <div class="sub-subject-grid">
                       <!--Sub Subject Class--->
                       <div class="sub-subject">
                           <div class="sub-subject-title"><b>Sub Subject</b></div>
                           <div class="sub-subject-content">Sub Subject Content</div>
                       </div>
                       <!--End Sub Subject Class-->
                   </div>
               </div>
               <!--End Main Subject Class-->
               
           </div>
    </div>
    </div>
<?php
require 'footer.php';
?>