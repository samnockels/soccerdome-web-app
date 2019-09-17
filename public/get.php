<?php

$user = 'root';
$pass = '';
    

try {
    $connection = new PDO('mysql:host=localhost; dbname=Soccerdome', $user, $pass);
}catch(PDOException $e){
    echo $e->getMessage();
}

$operation = $_GET['operation'];

if($operation == "getMatchTime"){
        
    $id = $_GET['id'];

    $query = $connection->query("SELECT * FROM fixtures WHERE id = '" . $id . "'");
        
    $r = $query->fetchObject();
    
    $time = $r->time;
    
    printf($time);
    
    
}else if($operation == "getMatchScore"){
    
    $id = $_GET['id'];

    $query = $connection->query("SELECT * FROM fixtures WHERE id = '" . $id . "'");
        
    $r = $query->fetchObject();
    
    $score = $r->score;
    
    printf($score);
    
    
}





