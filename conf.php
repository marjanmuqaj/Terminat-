<?php

$username  = 'root';

$password  = 'root';

try {

    $dbconn = new PDO('mysql:host=localhost;dbname=app', $username, $password);
    

} catch (PDOException $e) {

    print "Error!: " . $e->getMessage() . "<br/>";

    die();

}

$dbconn = null;

?>