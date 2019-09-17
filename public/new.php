<?php

include 'connect.php';
include 'functions.php';

session_start();

$username = $_SESSION['username'];

if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

$type = getUserInfo($username, "type", $connection);

if($type != "new_member"){
    redirectUser($_SESSION['userId'], $connection);
}


$forename = getUserInfo($username, "forename", $connection);
$surname = getUserInfo($username, "surname", $connection);





?>

<html>

    <head>
        <title><?php echo $forename . "'s Account" ?></title>
        <?php include 'links.html' ?>
    </head>
    
    <div id="main">
        
        <h1 class="center title"><?php echo $forename . "'s Account" ?></h1>
        <a href="logout.php"><p class="center">Logout</p></a>
        
        
    </div>

</html>