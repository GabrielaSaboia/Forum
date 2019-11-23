<?php
session_start();
$aEmail = $_SESSION['email'];
// include or create PDO
require("../model/pdo.php");

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
        $query = "SELECT * FROM `accounts` WHERE `email` = :email 
        AND `password` = :password";
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $accounts = $statement->fetchAll();
        $statement->closeCursor();

        if (count($accounts)>0) {
            $userId = $accounts[0]['id'];
            // Login Passed  week 9 mvc before anything about mvc actual page?
            header("Location: home.php?userId=$userId");

            // Put at top of home.php
            //$userId = filter_input(INPUT_GET, 'userId');
        } else {
            // Login Failed
            header('Location: ../Registration/index.html');
        }
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gabriela's IS 218 Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">

    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>

<div>Email = <?php echo $email;?>
    <span><?php echo $emailErr;?></span>
</div>
<div>Password = <?php if (!$passwordError) echo $password;?>
    <span><?php echo $passwordError;?></span>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
