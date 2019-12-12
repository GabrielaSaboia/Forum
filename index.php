<?php
require('model/database.php');
require('model/accounts_db.php');
require('model/questions_db.php');
include('views/header.php');

session_start();
$_SESSION['email'] = $aEmail;



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

switch ($action) {
    case 'show_login':
    {
        include('views/login.php');
        break;
    }
    case 'validate_login':
    {
        $aEmail = $_SESSION['email'];
        $userId = get_userId('email');
        $_SESSION['userId'] = $userId;

        $userId = filter_input(INPUT_POST, 'userId');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if ($email == NULL || $password == NULL) {
            $error = 'Email and Password are required';
            include('errors/error.php');
        } else {
            $userId = login($email, $password);

            if ($userId !== NULL) {

                header("Location: .?action=display_users&userId=$userId");
            } else {
                header("Location: .?action=show_registration_form&userId=$userId");
                //$error = 'Invalid Login';
                //include('errors/error.php');
            }
        }
        break;
    }
    case 'display_users':
    {

        $userId = $_SESSION['userId'];

        $userId = filter_input(INPUT_GET, 'userId');
        if ($userId == NULL) {
            $error = 'User Id unavailable';
            include('errors/error.php');
        } else {
            get_username($userId);
            $questions = get_questions($userId);
            include('Login/home.php');
        }
        break;
    }
    case 'show_registration_form':
    {

        $userId = $_SESSION['userId'];

        $userId = filter_input(INPUT_POST, 'userId');
        if ($userId == NULL) {
            $error = 'User Id unavailable';
            include('errors/error.php');
        } else {
            include('views/registration.php');
        }
        break;
    }
    case 'create-user':
    {
        $userId = $_SESSION['userId'];

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
        $userId = register_newUser($email, $firstName, $lastName, $birthday, $password);
        //header("Location: .?action=display_users&userId=$userId");
        header("Location: .?action=display_users&userId=$userId");
        break;
    }
    case 'show_question_form':
    {
        $userId = $_SESSION['userId'];
        $userId = filter_input(INPUT_POST, 'userId');
        if ($userId == NULL) {
            $error = 'User Id unavailable';
            include('errors/error.php');
        } else {
            include('views/questions.php');
        }
        break;
    }

    case 'new_question':
        {
            //$aEmail=$_SESSION['email'];
            $userId = $_SESSION['userId'];

            $userId = filter_input(INPUT_POST, 'userId');
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
                }//else if(strlen($body) < 500){
                // $bodyError ='Text must be shorter than 500 characters.';
                //$valid=false;
                //}
                //Checking skills section
                if(empty($skills)){
                    $skillError = 'Please add a skill.';
                    $valid=false;
                }else if(count($skillCheck) < 2){
                    $skillError = 'Please add another skill.';
                    $valid=false;
                }
                if($valid==true){
                    new_question($userId, $name, $body, $skills);
                }
                //include('views/questions.php');
                header("Location: .?action=display_users&userId=$userId");
            }
            break;
        }

    case 'delete_question': {
        $userId = $_SESSION['userId'];

        $questionId = filter_input(INPUT_POST, 'questionId');
        $userId = filter_input(INPUT_POST, 'userId');
        delete_question($questionId);
        header("Location: .?action=display_users&userId=$userId");
        break;
    }
        default:
            {
        $error = 'Unknown Action';
        include('errors/error.php');
        }
}

include('views/footer.php');