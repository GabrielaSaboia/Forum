<?php
session_start();
$aEmail = $_SESSION['email'];
//database path
require("../model/database.php");
require('../model/accounts_db.php');
require('../model/questions_db.php');



include('../views/header.php');
?>
<div class="col-lg">
        <div>First Name = <?php if(!$firstNameError) echo $firstName;?>
            <span><?php echo $firstNameError;?></span></div>

        <div>Last Name = <?php if(!$lastNameError) echo $lastName;?>
            <span><?php echo $lastNameError;?></span></div>

        <div> Birthday = <?php if(!$birthdayError) echo $birthday;?>
        <span> <?php echo $birthdayError;?></span></div>


        <div>Email = <?php if(!$emailErr) echo $email;?>
        <span><?php echo $emailErr;?></span></div>

        <div>Password = <?php if (!$passwordError) echo $password;?>
            <span><?php echo $passwordError;?></span></div>
</div>

<?php include('../views/footer.php'); ?>