<?php
$error = filter_input(INPUT_POST, 'error');
if ($error == NULL){
    $error = filter_input(INPUT_GET, 'error');
}


switch($error){
    case 'Email and Password are required':
    {
//Get value from input
$email = filter_input(INPUT_POST,'email');
$password = filter_input(INPUT_POST, 'password');

$checkEmail = strpos($email, '@');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //variable to validate database usage
    $formValid = true;

    If(empty($email)){
        $emailErr = "Enter an Email";
        $formValid=false;
    } else if($checkEmail === false){
        $emailErr = "Not an email";
        $formValid=false;
    }
    if(empty($password)){
        $passwordError ="Password required";
        $formValid=false;
    } else if(strlen($password) < 1){
        $passwordError = "Password must contain 8 characters";
        $formValid=false;
    }
    if($formValid==true){

        $accounts = login($email, $password);
        if (count($accounts)>0) {
            $userId = $accounts[0]['id'];
            // Login Passed  week 9 mvc before anything about mvc actual page?
            header("Location: home.php?userId=$userId");
            // Put at top of home.php
            //$userId = filter_input(INPUT_GET, 'userId');
        } else {
            // Login Failed
            header('Location: ../Registration/registration.php');
        }
    }
}

?>
<div>Email = <?php echo $email;?>
    <span><?php echo $emailErr;?></span>
</div>
<div>Password = <?php if (!$passwordError) echo $password;?>
    <span><?php echo $passwordError;?></span>
</div>
<?php
        break;
    }
    case 'User Id unavailable':
    {
        break;
    }

    case 'Registration Error':
    {?>
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

        <?php
        break;
    }
}