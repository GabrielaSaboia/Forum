<?php

function get_userId($email){
    global $db;
    $query = 'SELECT id FROM accounts WHERE email=:email';
    $statement =$db->prepare($query);
    $statement->bindValue(':email',$email);
    $statement->execute();
    $id= $statement->fetch();
    $statement->closeCursor();
    $userId=$id['id'];

    return $userId;
}

function get_username($userid){
global $db;
$query = 'SELECT fname, lname  FROM accounts WHERE id=:userid';
$statement =$db->prepare($query);
$statement->bindValue(':userid',$userid);
$statement->execute();
$names= $statement->fetch();
$statement->closeCursor();
$first=$names['fname'];
$second = $names['lname'];
return $first . ' ' . $second;
}

function get_questions($userid){

    global $db;
    $query = "SELECT * FROM questions WHERE ownerid=:id";
    $statement= $db->prepare($query);
    $statement->bindvalue(':id', $userid);
    $statement->execute();
    $question = $statement->fetchAll();
    $statement->closeCursor();

    return $question;
}
function delete_user($username){
    global $db;
    $query ="DELETE FROM accounts WHERE email=:email";
    $statement = $db->prepare($query);
    $statement->bindvalue(':email', $username);
    $statement->execute();
    $statement->closeCursor();
}