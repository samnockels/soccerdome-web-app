<?php

$user = 'root';
$pass = 'soccerdome';
    
try {
    $connection = new PDO('mysql:host=localhost:8050; dbname=Soccerdome', $user, $pass);
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}
   
?>