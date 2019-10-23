<?php
$name = filter_input(INPUT_POST, 'questionName');
$body = filter_input(INPUT_POST, 'body');
$skills= filter_input(INPUT_POST, 'skills');

$skillCheck = strpos($skills, ',');

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    //Checking name input
    if(empty($name)){
        $nameError = 'Please enter a name.';
    }else if(strlen($name) < 3){
        $nameErrorTwo= 'Name must be at least 3 characters long.';
    }
    //Checking Body content
    if(empty($body)){
        $bodyError = 'Please enter text.';
    }else if(strlen($body)>500){
        $bodyError ='Text must be shorter than 500 characters.';
    }
    //Checking skills section
    if(empty($skills)){
    $skillError = 'Please add a skill.';
    }else if($skillCheck === false){
     $skillError = 'Please enter more skills.';
    }
}
?>

<html>

</html>
