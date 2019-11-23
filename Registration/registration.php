<?php
session_start();
$aEmail = $_SESSION['email'];
//database path
require("../model/pdo.php");

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
$query = 'INSERT INTO accounts(email, fname, lname, birthday, password) 
    VALUES 
    (:email, :fname, :lname, :birthday, :password)';

//PDO statement

$statement = $db->prepare($query);
//Bind values to SQL
$statement->bindValue(':email', $email);
$statement->bindValue(':fname', $firstName);
$statement->bindValue(':lname', $lastName);
$statement->bindValue(':birthday', $birthday);
$statement->bindValue(':password', $password);

//execute sql query

$statement->execute();
//comment close database
$statement->closeCursor();

header("Location: ../Login/home.php?ue=$email");

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
