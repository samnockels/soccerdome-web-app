<?php

include 'connect.php';
include 'functions.php';

session_start();

$username = $_SESSION['username'];

if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

$type = getUserInfo($username, "type", $connection);

if($type != "team_member"){
    redirectUser($_SESSION['userId'], $connection);
}


$firstName = getUserInfo($username, "forename", $connection);
$secondName = getUserInfo($username, "surname", $connection);


?>



<html>
    
    <head>
        <title>Login</title>
        <?php include 'links.html'; ?>
    </head>
    
    <body>
    
        <div id="main">
            
            <h1 class="title">Home</h1>
            
            <center>
                <p><?php echo "Welcome Back, " . $firstName . "!"?></p>
                <a href="logout.php">Logout</a>
            </center>
        
        
            
        </div>
        
        
        
        
        
        
        
    </body>
    
</html>