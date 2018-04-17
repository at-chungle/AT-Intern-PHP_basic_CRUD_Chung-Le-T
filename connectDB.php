<?php
$servername = "localhost";
$username = "root";
$password = "ast";

try {
    $conn = new PDO("mysql:host=$servername;dbname=animals", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  return $conn;
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>