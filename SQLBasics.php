<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "sdp";

// Create connection
$conn = new mysqli("localhost", "root", "mysql", "sdp");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users (username, password)
VALUES ('John1', 'Doe')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>