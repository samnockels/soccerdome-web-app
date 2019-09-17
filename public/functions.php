<?php

function login($username, $password, $connection){

    $query = $connection->query("SELECT * FROM users WHERE username = '" . $username . "'");

    if($query->rowCount() > 0){

        $value = $query->fetchObject();
        $hashedPassword = $value->password;

        if(password_verify($password, $hashedPassword)){
            return true;
        }else{
            return false;
        }


    }else{
        return false;
    }
}

function register($forename, $surname, $username, $password, $email, $phone, $connection){

    $statement = $connection->prepare("INSERT INTO users (forename, surname, username, password, email, phone) VALUES (?, ?, ?, ?, ?, ?)");
    $statement->bindParam(1, $forename);
    $statement->bindParam(2, $surname);
    $statement->bindParam(3, $username);
    $statement->bindParam(4, password_hash($password, PASSWORD_DEFAULT));
    $statement->bindParam(5, $email);
    $statement->bindParam(6, $phone);

    $statement->execute();

    return true;

}

function redirectUser($userId, $connection){

    $query = $connection->query("SELECT * FROM users WHERE id = '" . $userId . "'");


    $value = $query->fetchObject();
    $type = $value->type;



    //switch statement used instead of an if statement
    //to improve readability
    switch($type){

        case "admin":
            header('Location: admin.php');
            break;
        case "team_member":
            header('Location: home.php');
            break;
        case "new_member";
            header('Location: new.php');
            break;

    }

}

function getUserInfo($username, $data, $connection){


    $query = $connection->query("SELECT " . $data . " FROM users WHERE username = '" . $username . "'");

    $value = $query->fetchObject();

    switch($data){

        case "id": 
            return $value->id;
            break;
        case "forename": 
            return $value->forename;
            break;
        case "surname": 
            return $value->surname;
            break;
        case "type": 
            return $value->type;
            break;

    }


}

function checkPitchAvailability($i, $date, $time, $connection){

    $query = $connection->query("SELECT availability FROM pitches WHERE pitchNumber = '" . $i . "' AND date = '" . $date . "'" );

    if($query->rowCount() == 0){

        return "available";

    }else{

        $value = $query->fetchObject();
        $availability = $value->availability;

        if($availability == "league_match"){

            return "league_match";

        }elseif($availability == "booked"){

            return "booked";

        }

    }

}

function getPitchInfo($pitchNumber, $date, $time, $data, $connection){

    $query = $connection->query("SELECT * FROM pitches WHERE pitchNumber = '" . $i . "' AND date = '" . $date . "'" );
    $value = $query->fetchObject();

    switch($data){

        case "time":
            return $value->time;

    }

}

?>

