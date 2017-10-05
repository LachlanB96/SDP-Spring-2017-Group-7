<?php

$conn = new mysqli("localhost", "root", "mysql", "sdp");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if($_POST['action'] == "create"){
	if($_POST['type'] == "user"){
		$sql = "INSERT INTO users (username, password)
		VALUES ('".$_POST['username']."','".$_POST['password']."')";
	}
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if($_POST['action'] == "write"){
	if($_POST['type'] == "entry"){
		$sql="INSERT INTO 'sdp'.'journalEntries' ('title', 'journal', 'creator', 'contents', 'dateCreated') 
		VALUES ('" . $_POST['entryName'] . "', '" . $_POST['journalName'] . "', '" . $_POST['creator'] . "', '" . $_POST['contents'] . "', '" . "1/1/12" . "')";
		mysqli_query($con,$sql);
	}
}
$conn->close();

?>