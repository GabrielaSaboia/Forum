<?php
$name = filter_input(INPUT_POST, 'questionName');
$body = filter_input(INPUT_POST, 'body');
$skills= filter_input(INPUT_POST, 'skills');

$skillCheck = explode(',', $skills);

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    //Checking name input
    if(empty($name)){
        $nameError = 'Please enter a name.';
    }else if(strlen($name) < 3){
        $nameError= 'Name must be at least 3 characters long.';
    }
    //Checking Body content
    if(empty($body)){
        $bodyError = 'Please enter text.';
    }else if(strlen($body) < 500){
        $bodyError ='Text must be shorter than 500 characters.';
    }
    //Checking skills section
    if(empty($skills)){
        $skillError = 'Please add a skill.';
    }else if(count($skillCheck) < 2){
        $skillError = 'Please add another skill.';
    }
}
?>

<html>
<div> Name: <?php if(!$nameError) echo $name;?>
<span><?php echo $nameError;?></span></div>
<div>Body: <?php if(!$bodyError) echo $body;?>
    <span><?php echo $bodyError;?></span></div>
<div>Skills: <?php if(!$skillError) print_r( $skills);?>
    <span><?php echo $skillError;?></span></div>
</html>
