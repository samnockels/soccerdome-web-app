<?php

include 'connect.php';
include 'functions.php';

session_start();

$username = $_SESSION['username'];

if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

$type = getUserInfo($username, "type", $connection);

if($type != "admin"){
    redirectUser($_SESSION['userId'], $connection);
}
?>

<html>

    <head>
        <?php include 'links.html'; ?>
        <script>
                
                    var statusIntervalId = window.setInterval(update, 1);

                    function update() {
                        $.ajax({
                            url: 'get.php?operation=getMatchTime&id=6',
                            dataType: 'text',
                            success: function(response) {
                                
                                $("#time").text(response);
                                
                            }
                        });
                        
                    };
                    
                    
                    
                
        </script>
    </head>
    
    <body>
    
        <div id="main">
            <h1 id="time" class="title">Admin</h1>
            <a href="logout.php"><p class="center">Logout</p></a>
            
            
        </div>
    
    </body>
    
</html>