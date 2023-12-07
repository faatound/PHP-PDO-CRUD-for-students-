<?php
$servername="localhost";
$username="root";
$password="";
$database="etudiants";


try {
    $conn = new
    PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,
     PDO::ERRMODE_EXCEPTION);
     echo "connected successfuly";
    
} catch (PDOException $e) {
    echo "you are not connected" .$e->getMessage();
}
?>