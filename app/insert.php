<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	createStudent();
    
}

function createstudent()
{
	
    // configuration
    $dbhost     = "localhost";
    $dbname     = "tutorial";
    $dbuser     = "root";
    $dbpass     = "";

    // database connection
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

    // new data
    $firstname = $_POST['firstname'];
    // query
    $sql = "INSERT INTO student(firstname) VALUES (:firstname)";
    $q = $conn->prepare($sql);
    $q->execute(array(':firstname'=>$firstname));



	
}
?>