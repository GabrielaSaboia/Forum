<?php

//Function that retrieves a user ID when given an email for the account

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

function login($email, $password){

    global $db;
    $query = "SELECT * FROM `accounts` WHERE `email` = :email 
        AND `password` = :password";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $accounts = $statement->fetchAll();
    $statement->closeCursor();
    return $accounts[0]['id'];

}
// FUnction that retrieves a user ID when given an email for the account

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

function register_newUser($email, $firstName, $lastName, $birthday, $password){
    global $db;

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
    return $db->lastInsertId();
}


function delete_user($username){
    global $db;
    $query ="DELETE FROM accounts WHERE email=:email";
    $statement = $db->prepare($query);
    $statement->bindvalue(':email', $username);
    $statement->execute();
    $statement->closeCursor();
}