<?php

require("../pdo.php");
// Put at top of home.php
$userId = filter_input(INPUT_GET, 'userId');

$name = filter_input(INPUT_POST, 'questionName');
$body = filter_input(INPUT_POST, 'body');
$skills= filter_input(INPUT_POST, 'skills');

$skillCheck = explode(',', $skills);

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $valid = true;
    //Checking name input
    if(empty($name)){
        $nameError = 'Please enter a name.';
        $valid=false;
    }else if(strlen($name) < 3){
        $nameError= 'Name must be at least 3 characters long.';
        $valid=false;
    }
    //Checking Body content
    if(empty($body)){
        $bodyError = 'Please enter text.';
        $valid=false;
    }else if(strlen($body) < 500){
        $bodyError ='Text must be shorter than 500 characters.';
        $valid=false;
    }
    //Checking skills section
    if(empty($skills)){
        $skillError = 'Please add a skill.';
        $valid=false;
    }else if(count($skillCheck) < 2){
        $skillError = 'Please add another skill.';
        $valid=false;
    }
    if($valid==true){

        $query = "INSERT INTO `questions`(`ownerid`,`title`, `body`, `skills`) 
VALUES (':ownerid',':title', ':body', ':skills')";
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $name);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':skills', $skills);
        $statement->bindValue(':ownerid', $userId);
        $statement->execute();
        $accounts = $statement->fetch();
        $statement->closeCursor();

        //redirect to question page
        header('Location: profile.php');

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

    <div class="col-lg-10">
        <div> Name: <?php if(!$nameError) echo $name;?>
        <span><?php echo $nameError;?></span></div>
        <div>Body: <?php if(!$bodyError) echo $body;?>
            <span><?php echo $bodyError;?></span></div>
        <div>Skills: <?php if(!$skillError) print_r( $skills);?>
            <span><?php echo $skillError;?></span></div>
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
