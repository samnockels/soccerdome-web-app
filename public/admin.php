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
        
    </head>
    
    <body>
    
        <div id="main">
            <h1 class="title">Admin</h1>
            
            <div id="matches">
                <p class="title">Matches happening today:</p>
                <center>
                <table class="prem center" border="1" width="90%">

                    <tr class="table-header">

                        <th>Score</th>
                        <th>Fixture</th>
                        <th>Kick Off Time</th>
                        <th>Time Commenced</th>

                    </tr>    

                        <?php


                                $stmt = $connection->query("SELECT * FROM fixtures WHERE date = '2015/11/1'");
                                
                                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                                    
                                    $id = $row->id;
                                    $team_a = $row->team_a;
                                    $team_b = $row->team_b;
                                    $score = $row->score;
                                    $startTime = $row->startTime;
                                    $progress = $row->progress;
                                    $time = $row->time;
                                    
                                    
                                    echo "<tr>";
                                    echo "<td class='center'><p id='match-" . $id . "-score'>" . $score . "</p></td>";
                                    echo "<td>" . $team_a . "  vs  " . $team_b . "</td>";
                                    echo "<td>" . $startTime . "</td>";
                                     
                                    
                                    ?>
                                    <script>
                
                                    var statusIntervalId = window.setInterval(update, 1);

                                    function update() {
                                        var address = "get.php?operation=getMatchTime&id=" + <?php echo $id ?>;
                                        $.ajax({
                                            url: address,
                                            dataType: 'text',
                                            success: function(response) {
                                                
                                                var matchTime = "#match-" + <?php echo $id ?> + "-time";
                                                var matchColour = "#match-" + <?php echo $id ?> + "-colour";

                                                $(matchTime).text(response);
                                                
                                                if($(matchTime).text() != '00:00:00'){
                                                    
                                                    $(matchColour).removeClass('not-started').addClass('started');
                                        
                                                }
                                                
                                                

                                            }
                                        });
                                        address = "get.php?operation=getMatchScore&id=" + <?php echo $id ?>;
                                        $.ajax({
                                            url: address,
                                            dataType: 'text',
                                            success: function(response) {
                                                
                                                var matchScore = "#match-" + <?php echo $id ?> + "-score";

                                                $(matchScore).text(response);
                                                
                                                
                                                
                                                

                                            }
                                        });
                                        

                                    };

                                    </script>
                                    <?php
                                    
                                    echo "<td id='match-" . $id . "-colour' class='center not-started'><p id='match-" . $id . "-time'>".$time."</p></td>";
                                    
                                    
                                    
                                    
                                    echo "</tr>";
                                    
                                }

                                
                    
                                

                                

                            
                        ?>

                </table>
                </center>
            </div>
            
            <div id="bookings">
                <p class="title">Bookings</p>
            </div>
        
        </div>
    
    </body>
    
</html>