<?php

//A new session is created so $_SESSION variables
//can be passed between pages.
session_start();


//includes the connection to the database
include 'connect.php';
include 'functions.php';

?>

<html>
    
    <head>
        <title>Login</title>
        <?php include 'links.html'; ?>
    </head>
    
    <body>
    
        <div id="main">
            
            <h1 class="title">Checkout</h1>
            
            <script>
                
            var date = new Date();
            var hour = date.getUTCHours() + 1; //the local time for the soccerdome is 1 hour past UTC time.
            var minute = date.getUTCMinutes();    
                
            alert(hour + " : " + minute);
                
            </script>
        
            
        </div>
        
        
        
        
        
        
        
    </body>
    
</html>