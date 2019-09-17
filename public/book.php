<?php


//includes the connection to the database and access to user defined functions
include 'connect.php';
include 'functions.php';

//if the form has been completed (full date selected from dropdown menus) then
//retrieve the selected options (these are stored in the $_POST variables) and
//format them (YYYY/MM/DD) and store them in the date variable.
if(!empty($_POST['year']) && !empty($_POST['month']) && !empty($_POST['day'])){
    
    //creates a new session, so that if the user proceeds to the checkout,
    //the pitch details can be accessed using the $_SESSION variables on next page.
    session_start();
    
    //$date is formatted for querying the data as Date data types are formatted in (YYYY/MM/DD) on the server
    $date = $_POST['year'] . "/" . $_POST['month'] . "/" . $_POST['day'];
    
    //$datePrint is formatted for display on the webpage (format DD/MM/YYYY)
    $datePrint = $_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year'];
    
    
    //setting variables for use on this page
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $time = $_POST['time_'];    
    
    //setting Session Variables
    $_SESSION['year'] = $year;
    $_SESSION['month'] = $month;
    $_SESSION['day'] = $day;
    $_SESSION['time_'] = $time;
    $_SESSION['date'] = $time;
    
    $error = false;
    
}else{
    
    $error = true;
    
    //These variables have to be set otherwise
    //the javascript function updateOptionValues() will not work.
    $year = "";
    $month = "";
    $day = "";
    $time = "";
}

?>


<html>

    <head>
        <title>Book a Pitch</title>
        <?php include 'links.html' ?>
        <script>
            function updateOptionValues(){

                var year = "<?= $year; ?>";
                var month = "<?= $month; ?>";
                var day = "<?= $day; ?>";

                document.getElementById("year_title").selected = false;
                document.getElementById("<?= $year; ?>").selected = true;

                yearChanged();

                document.getElementById("month_title").selected = false;
                document.getElementById("<?= $month; ?>").selected = true;

                monthChanged();

                document.getElementById("day_title").selected = false;
                document.getElementById("D <?= $day; ?>").selected = true;
                
                dayChanged();

                document.getElementById("time_title").selected = false;
                document.getElementById("<?= $time; ?>").selected = true;


            }
        </script>
    </head>
    
    <div id="main" class="book">
        
        <!--Back Button-->
        <a href="index.php">
            <div id="back_button">
                <p style="color:white;"> < </p>
            </div>
        </a>
    
        <h1 class="center title">Book a Pitch</h1>
        
        <!--Section for selecting the Date & Time-->
        <div id="date">
            
            <p class="title">Select Date/Time</p>
            <form action="book.php" method="post">
                <center>
                    
                    <!--Year Dropdown-->
                <select name="year" id="year" onchange="yearChanged()">
                        <option id="year_title" selected="selected" disabled="disabled">Year</option>
                        <option id="2015" value="2015" >2015</option>
                    </select>
                    
                    <!--Month Dropdown-->
                    <select name="month" id="month" onchange="monthChanged()">
                        <option id="month_title" selected disabled>Month</option>
                    </select>
                    
                    <!--Day Dropdown-->
                    <select name="day" id="day" onchange="dayChanged()">
                        <option id="day_title"selected="selected" disabled="disabled">Day</option>
                    </select>       
                    
                    <br><br>
                    
                    <!--Time Dropdown-->
                    <select name="time_" id="time_">
                        <option id="time_title" selected disabled>Time</option>
                    </select>
                    
                    <br><br>
                    
                    <input type="submit" value="Check Availability">
                </center>
            </form>
        </div>
        
        <div id="wrap">
        
        <?php

        //If the dropdown boxes havent been completed, $error becomes true.
        if($error == true){

            echo "<p class='title' style='color: red;'>Please select a date and time</p>";

        }else{

            echo "<div id='pitches'>\n";

            for($j = 1; $j <= 2; $j++){

                
                echo "\t<div>\n";

                for($i = 1; $i <= 10; $i++){

                    if ($j == 1){
                        $pitchNumber = $i;
                    }else{
                        $pitchNumber = $i + 10;
                    }

                    $availability = checkPitchAvailability($pitchNumber, $date, $time, $connection);

                    switch($availability){

                        case "booked":
                            echo "\t\t<div class='pitch booked ' id='Pitch" . $pitchNumber . "' onclick='selectPitch(" . $pitchNumber . ")'><p>" . $pitchNumber . "</p></div>\n";
                            break;

                        case "league_match":
                            echo "\t\t<div class='pitch league_match ' id='Pitch" . $pitchNumber . "' onclick='selectPitch(" . $pitchNumber . ")'><p>" . $pitchNumber . "</p></div>\n";
                            break;

                        default:
                            echo "\t\t<div class='pitch available ' id='Pitch" . $pitchNumber . "' onclick='selectPitch(" . $pitchNumber . ")'><p>" . $pitchNumber . "</p></div>\n";
                            break;

                    }   
                }

            echo "\t</div>\n";

            }       
            echo "\t</div>\n";
        ?>


    <!--Displays information about the selected pitch-->
    <div id="pitch_details">
        <div id="slot_info">
            <center>
                
                
                <!--This table is shown if the pitch is available-->
                <table id="slot_details">
                    <p class="white title">Pitch Details</p>
                    <tr>
                        <td colspan="2" class="heading"><p class="white thin" style="margin-left:5px;">Slot Details</p></td>
                    </tr>
                    <tr>
                        <td><span style="margin-left:8px;">Pitch Number:</span></td>
                        <td class="black" id="Pitch_Number">1</td>
                    </tr>
                    <tr>
                        <td><span style="margin-left:8px;">Slot Time:</span></td>
                        <td class="black" id="Slot_Time"><?php echo $time; ?></td>
                    </tr>
                    <tr>
                        <td><span style="margin-left:8px;">Slot Date:</span></td>
                        <td class="black" id="Slot_Date"><?php echo $datePrint; ?></td>
                    </tr>
                    <tr>
                        <td><span style="margin-left:8px;">Slot Duration:</span></td>
                        <td class="black" id="Slot_Duration">1 Hour</td>
                    </tr>
                    <tr style="border-top: 15px inset #232d36;">
                        <td><span style="margin-left:8px;">Total:</span></td>
                        <td class="black">£<span id="Slot_Price">20.00</span></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="background-color:#ffc53a; border-radius:5px; border-top: 5px solid #fff; cursor:pointer;"  onclick="window.location.href = 'checkout.php'"   >
                            <center>
                                <span style="margin-left:8px; color:#232d36">Checkout</span>
                            </center>
                        </td>
                    </tr>
                </table>
                
                <!--This table is shown if the pitch is booked-->
                <table id="slot_booked">
                    <tr>
                        <td colspan="2" class="heading"><p class="white thin" style="margin-left:5px;">Slot Details</p></td>
                    </tr>
                    <tr>
                        <td><span style="margin-left:8px;">Pitch Number:</span></td>
                        <td class="black" id="Pitch_Number">1</td>
                    </tr>
                    <tr>
                        <td colspan="2"><center><span style="color:red;">This Slot has been booked.</span></center></td>
                    </tr>
                </table>

                <!--This table is shown if the pitch has a league match booked-->
                <table id="slot_league_match">
                    <tr>
                        <td colspan="2" class="heading"><p class="white thin" style="margin-left:5px;">Slot Details</p></td>

                    </tr>
                    <tr>
                        <td><span style="margin-left:8px;">Pitch Number:</span></td>
                        <td class="black" id="Pitch_Number">1</td>
                    </tr>
                    <tr>
                        <td colspan="2"><center><span style="color:red;">This Slot is being used for a League Match.</span></center></td>
                    </tr>
                </table>
            </center>
            
        </div>
        
    </div>      
        

        <?php 
            
        ?>

        </div> <!--End of the wrap div-->
        
    </div><!--End of the Main div-->
    <?php
            
            echo "<script> window.onload = PageLoad(); </script>";
            
            } //End of the if($error == true) else statement
            
            
        ?>
    
    

</html>