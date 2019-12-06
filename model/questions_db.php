<?php

//i. Get all user’s questions
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

//ii. Get 1 specific question

//iii. Create a Question
function new_question($userId, $name, $body, $skills){

    global $db;
    $query = 'INSERT INTO questions(ownerid, title, body, skills) 
            VALUES 
            (:ownerid,:title, :body, :skills)';

    $statement = $db->prepare($query);
    $statement->bindValue(':ownerid', $userId);
    $statement->bindValue(':title', $name);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':skills', $skills);
    $statement->execute();
    $statement->closeCursor();
}

//iv. Edit a question
function edit_question($title, $body, $skills, $id){
    global $db;
    $query ="UPDATE questions 
    SET title = :title
    body =:body
    skills =:skills
    WHERE id=:id";
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':skills', $skills);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

//v. Delete a question
function delete_question($title){
    global $db;
    $query ="DELETE FROM accounts WHERE title=:title";
    $statement = $db->prepare($query);
    $statement->bindvalue(':email', $title);
    $statement->execute();
    $statement->closeCursor();
}