<?php
$servername = "localhost";
$username = "c34_2018";
$password = "comp334!";
$dbname = "c34_2018";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully Sandooseh ^_*";

$conn->close();

?>