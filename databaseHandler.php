<?php

session_start();

$conn = new mysqli("localhost", "root", "mysql", "sdp");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 


if($_POST['action'] == "create"){
	if($_POST['type'] == "user"){
		echo "TEST dhnwjnwdn";
		$sql = "INSERT INTO users (username, password)
		VALUES ('".$_POST['username']."','".$_POST['password']."')";
	}
	else if($_POST['type'] == "journal"){
		$sql = "INSERT INTO users (username, password)
		VALUES ('".$_POST['username']."','".$_POST['password']."')";
		echo $sql;
	}
	if ($conn->query($sql) === TRUE) {

		
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

else if($_POST['action'] == "read"){
	if($_POST['type'] == "login"){
		$sql="SELECT * FROM users WHERE username LIKE '" . $_POST['username'] . "'";
		if ($users=$conn->query($sql)){
			while ($user=mysqli_fetch_row($users)){
				echo $user[0];
				$_SESSION['currentUser'] = $user[0];
			}
		}
	}
	else if($_POST['type'] == "journal"){
		if(!isset($_SESSION['currentUser'])){
            echo "LOGIN FIRST";
        } else {
			$sql="SELECT * FROM journals WHERE creator LIKE '" . $_SESSION['currentUser'] . "'";
			if ($journals=$conn->query($sql)){
				while ($journal=mysqli_fetch_row($journals)){
					printf ("(Title) %s (Creator) %s", $journal[0], $journal[1]);
					$_SESSION['currentUser'] = $journal[0];
				}
			}
		}
	}
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