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

echo "Connected successfully" . "<br>";

/* Select data */
$sql = "SELECT id, email, username FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " - id: " . $row["id"]. "<br> - Email: " . $row["email"]. "<br> - Username: " . $row["username"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

?>