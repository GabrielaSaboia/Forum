<?php
session_start();
$aEmail = $_SESSION['email'];

require('../model/pdo.php');
require('../model/pdoFunctions.php');
// Put at top of home.php
$userId = filter_input(INPUT_GET, 'userId');
$email = filter_input(INPUT_GET, 'ue');

?>

<DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gabriela's IS 218 Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">

    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
</head>
<body>
<div >
    <nav class="navbar navbar-expand-md">
        <ul>
            <div class="where">
                <div class="nav-logo logo-img">
                    <img src="../img/logo.png"></div>
                <li><a href="home.php">Home</a></li>
                <li><a href="../Questions/index.php">Ask Something</a></li>
            </div>
        </ul>
    </nav>
</div>
<div class="container">

    <?php
    if ($userId == null){$userId = get_userId($email);
    }
    echo '<h1 class="display-4">'; echo get_username($userId); echo '</h1>';
    $questionHistory = get_questions($userId);?>


    <table class="table table-light table-bordered" >
        <thead class="thead-light">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Skills</th>
            </tr>
        </thead>

        <?php foreach ($questionHistory as $question) : ?>


            <tr scope="row">
                <td> 1 <?php echo $question['title']; ?></td>
                <td> 2 <?php echo $question['body']; ?></td>
                <td> 3 <?php echo $question['skills']; ?></td>
            </tr>

            <?php endforeach; ?>
    </table>
    <button type="submit" class="btn" ><a href="../Questions/index.php">submit new question</a></button>


</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>
</html>