<?php
//Get value from input
$firstName = filter_input(INPUT_POST,'first_name');
$lastName = filter_input(INPUT_POST,'lastName');
$birthday = filter_input(INPUT_POST,'birthday');
$email = filter_input(INPUT_POST,'email');
$password = filter_input(INPUT_POST, 'password');

$checkEmail = strpos($email, '@');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    If(empty($email)){
        $emailErr = "Enter an Email";
    } else if($checkEmail === false){
        $emailErr = "Not an email";
    }
    if(empty($password)){
        $passwordError ="Password required";
    } else if(strlen($password) <= 8){
        $passwordError = "Password must contain 8 characters";
    }
    If(empty($firstName)){
        $firstNameError = "Must write a name";
    }
    If(empty($lastName)){
        $lastNameError = "Must write a last name";
    }
    If(empty($birthday)){
        $birthdayError = "Enter your birthday!";
    }
}
?>
<html>
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

</html>
