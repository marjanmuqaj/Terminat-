<?php
try{
	$host = "localhost";  
 $username = "root";  
 $password = "root";  
 $database = "app";
     
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
}catch(PDOException $pdo){
    die("Unsuccessful connection");
}