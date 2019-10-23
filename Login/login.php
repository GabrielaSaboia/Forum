<?php
//Get value from input
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
}
?>
<html>
<div>Email = <?php echo $email;?>
<span><?php echo $emailErr;?></span></div>
<div>Password = <?php if (!$passwordError) echo $password;?>
    <span><?php echo $passwordError;?></span>
</div>

</html>
