<?php
define('hostname', 'localhost');
define('user', 'root');
define('password', '');
define('databaseName', 'tutorial');
$connect = mysqli_connect(hostname, user, password, databaseName);

$user = 'root';
$pass = '';
    

try {
    $connection = new PDO('mysql:host=localhost:8050; dbname=Soccerdome', $user, $pass);
}catch(PDOException $e){
    echo $e->getMessage();
}
?>