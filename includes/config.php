<?php
// Database connection using PDO
$host = 'localhost';
$user = 'root'; 
$pass = '';     
$dbname   = 'photo_gallery';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch(PDOException $th) {
    echo "Connection failed: " . $th->getMessage();
  }
  


