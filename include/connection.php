<?php

// Default timezone
date_default_timezone_set('Asia/Kolkata');

// Db details
if(($_SERVER['SERVER_NAME']=='example.com')||($_SERVER['SERVER_NAME']=='www.example.com')) {
    $dbHost = 'localhost';
    $dbUsername = 'REPLACE_THIS';
    $dbPassword = 'REPLACE_THIS';
    $dbName = 'REPLACE_THIS';
}
else {
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'backend';  
}

//Connect and select the database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>