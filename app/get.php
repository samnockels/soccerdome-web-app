<?php


//Connecting to the database

$user = 'root';
$pass = '';

try {
    $connection = new PDO('mysql:host=localhost; dbname=Soccerdome', $user, $pass);
}catch(PDOException $e){
    echo $e->getMessage();
}

$operation = $_GET['operation'];

if($operation == "get_fixtures"){
 
    $result = getFixtures($connection);
    printf($result);
    
}else if($operation == "getMatchTime"){
 
    $result = getMatchTime();
    printf($result);
    
}

function getFixtures($connection){
    
    $date = $_GET['date'];

    $query = $connection->query("SELECT * FROM fixtures WHERE date = '" . $date . "'");
    
    //If there are no values returned from the query
    if($query->rowCount() == 0){
        
        return "No Results";
    
    }else{
        
        //iterating through the results
        while($row = $query->fetch(PDO::FETCH_OBJ)){
            
            //retrieving team a and b from results
            $teamA = trim($row->team_a);
            $teamB = trim($row->team_b);
            $match_id = $row->id;
            
            //formatting the teams into an array.
            $string[] = $teamA . "+" . $teamB . "/" . $match_id;
            
        }
        
        //array size needs to include 0, so 1 is subtracted.
        $arraySize = count($string) - 1;
        
        $returnValue = "";
        
        //Looping through the array, creating one string with all of the fixtures.
        for($i = 0; $i <= $arraySize; $i++){

                
                if($i < $arraySize){

                    //append the value of the array with index i, to the return value.
                    //the '=' sign is used to seperate the fixtures.
                    $returnValue .= $string[$i] . "=";

                }else{
                 
                    //the last fixture doesn't need the '=' added at the end.
                    $returnValue .= $string[$i];
                    
                }

        }
        
        return $returnValue;
        
    }
    
}

function getMatchTime($connection){
    
    $id = $_GET['id'];

    $query = $conn->query("SELECT * FROM fixtures WHERE id = '" . $id . "'");
        
    $r = $query->fetchObject();
    
    $time = $r->time;
    
    printf($time);
    
}





    






