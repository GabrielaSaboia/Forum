<?php


require("../model/database.php");
require('../model/accounts_db.php');
require('../model/questions_db.php');
// Put at top of home.php




include('../views/header.php');
?>
    <div class="col-lg-10">
        <div> Name: <?php if(!$nameError) echo $name;?>
        <span><?php echo $nameError;?></span></div>
        <div>Body: <?php if(!$bodyError) echo $body;?>
            <span><?php echo $bodyError;?></span></div>
        <div>Skills: <?php if(!$skillError) print_r( $skills);?>
            <span><?php echo $skillError;?></span></div>
    </div>

<?php include('../views/footer.php'); ?>