<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $user = 'root';
    $pass = '';

    try {
        $connection = new PDO('mysql:host=localhost; dbname=Soccerdome', $user, $pass);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $operation = $_POST['operation'];
    
    if ($operation == "updateTime"){
        updateTime($connection);    
    }else if ($operation == "updateMatchScore"){
        updateMatchScore($connection);    
    }
	    
}

function updateTime($connection)
{

    $time = $_POST['time'];
    $id = $_POST['match_id'];
    
    $query = $connection->query("UPDATE fixtures SET time = '" . $time . "' WHERE id = '" . $id . "'");
    
    $q = $connection->prepare($query);
    $q->execute();
	
}
function updateMatchScore($connection)
{
  
    $id = $_POST['match_id'];
    $scoreA = $_POST['team_a_score'];
    $scoreB = $_POST['team_b_score'];
    $score = $scoreA . "-" . $scoreB;
    
    $query = $connection->query("UPDATE fixtures SET score = :score WHERE id = :id");
    
    $q = $connection->prepare($query);
    $q->bindParam(':id', $id);
    $q->bindParam(':score', $score);
    $q->execute();
	
}

?>