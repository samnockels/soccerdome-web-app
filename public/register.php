<?php

include 'connect.php';
include 'functions.php';

$error = "";
$missingField = "";
$successMsg = "";

if(empty($_POST) == false){
    
    if($_POST['password'] != $_POST['password_confirm']){
        $error = "Passwords do not match!";
    }
    
    $append = false;
    
    if( trim($_POST['forename']) == "" ){
        $missingField .= " - Forename";  
        $append = true;
    }
    if( trim($_POST['surname']) == "" ){
        $missingField .= " - Surname"; 
        $append = true;
    }
    if( trim($_POST['username']) == "" ){
        $missingField .= " - Username"; 
        $append = true;
    }
    if( trim($_POST['password']) == "" ){
        $missingField .= " - Password";  
        $append = true;
    }
    if( trim($_POST['email']) == "" ){
        $missingField .= " - Email";   
        $append = true;
    }
    if( trim($_POST['phone']) == "" ){
        $missingField .= " - Phone";   
        $append = true;
    }
    if($append){
        $missingField = "Missing Fields: " . $missingField;
    }
    
    if(empty($error) and empty($missingField)){
    
        $success = register($_POST['forename'], $_POST['surname'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone'], $connection);
        
        if($success){
            $successMsg = "Success! You are now a member!";
        }
    
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
            
            <form method="POST" style="padding-top: 50px;">
                <center>
                    <input class="textbox" name="forename" type="text" placeholder="First Name">
                    <br/>
                    <input class="textbox" name="surname" type="text" placeholder="Last Name">
                    <br/>
                    <input class="textbox" name="username" type="text" placeholder="Username">
                    <br/>
                    <input class="textbox" name="password" type="password" placeholder="Password">
                    <br/>
                    <input class="textbox" name="password_confirm" type="password_confirm" placeholder="Confirm Password">
                    <br/>
                    <input class="textbox" name="email" type="text" placeholder="Email">
                    <br/>
                    <input class="textbox" name="phone" type="number" placeholder="Phone Number">
                    <br/>
                    <input class="button" type="submit" value="Register">
                    <br/>
                    <p style="color: red;"><?php echo $error; ?></p>
                    <p style="color: red;"><?php echo $missingField; ?></p>
                    <p style="color: green;"><?php echo $successMsg; ?></p>
                    <br/><br/><br/>
                    <a href="index.php">Login Here</a>
                    
                </center>
            </form>
            
        </div>
        
    </body>
    
</html>