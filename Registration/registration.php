<?php
session_start();
$aEmail = $_SESSION['email'];
//database path
require("../model/database.php");
require('../model/accounts_db.php');
require('../model/questions_db.php');



include('../views/header.php');

<?php include('../views/footer.php'); ?>