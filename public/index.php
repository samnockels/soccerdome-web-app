<?php

//A new session is created so $_SESSION variables
//can be passed between pages.
session_start();

//includes the connection to the database
include 'connect.php';
include 'functions.php';

$error = "";

if(isset($_SESSION['userId'])){
    
    redirectUser($_SESSION['userId'], $connection);

}

if(isset($_POST['username'])){
    
    $username = $_POST['username'];    
    $password = $_POST['password'];    
    
    $loginSuccess = login($username, $password, $connection);
    
    if($loginSuccess){
    
        unset($_POST['username']);
        unset($_POST['password']);
        
        $_SESSION['username'] = $username;
        $_SESSION['userId'] = getUserInfo($username, "id", $connection);
        echo $_SESSION['userId'];
        
        //calls a function which will redirect the user
        //depending on their account type. (Admin/Team Member/New Member)
        redirectUser($_SESSION['userId'], $connection);
            
    }else{
    
        $error = "Incorrect Username or Password!";
        
    }
}
?>

<html>
    
    <head>
        <title>Login</title>
        <?php include 'links.html'; ?>
    </head>
    
    <body>
    
        <div id="main">
            
            <h1 class="title">Soccerdome 5 aside Football</h1>
            <form method="POST" style="padding-top: 30px;">
                <center>
                    <input class="textbox" name="username" type="text" placeholder="Username">
                    <br/>
                    <input class="textbox" name="password" type="password" placeholder="Password">
                    <br/>
                    <input class="button" type="submit" value="Login">
                    <p style="color: red;"><?php echo $error; ?></p>
                </center>
            </form>
        
            
            <a href="register.php">
                <div id="memberBox">
                    <p class="center thin" style="color:white;">Become a</p>
                    <h1 class="center black" style="color:white;">Member!</h1>
                    <p class="center thin" style="color:white;">Register now for Free!</p>
                </div>
            </a>
            <a href="book.php">
                <div id="bookBox">
                    <p class="center thin" style="color:white;">Why don't you</p>
                    <h1 class="center black" style="color:white;">Book a Pitch?</h1>
                    <p class="center thin" style="color:white;">We have <strong>20</strong> five aside pitches to choose from, <br> with prices starting from <strong>£20 per Hour.</strong></p>
                </div>
            </a>

        
            
        </div>
        
        
        
        
        
        
        
    </body>
    
</html>