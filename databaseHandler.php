<?php

session_start();


//DEBUG FAKE VALUES
//$_POST['action'] = "read";
//$_POST['type'] = "journal";


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
		$sql = "INSERT INTO journals (title, creator, creationDate, status)
		VALUES ('".$_POST['title']."','".$_SESSION['currentUser']."','".$_POST['creationDate']."','active')";
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
		if($_POST['username'] == "admin"){
			echo "admin";
			$_SESSION['currentUser'] = "admin";
		} else if ($users=$conn->query($sql)){
			$sql="SELECT * FROM users WHERE username LIKE '" . $_POST['username'] . "'";
			while ($user=mysqli_fetch_row($users)){
				echo $user[0];
				$_SESSION['currentUser'] = $user[0];
			}
		}
	} else if($_POST['type'] == "journal"){
		if(!isset($_SESSION['currentUser'])){
            echo "LOGIN FIRST";
        } else {
        	if($_SESSION['currentUser'] == "admin"){
        		$sql="SELECT * FROM journals";
        	} else {
				$sql="SELECT * FROM journals WHERE creator LIKE '" . $_SESSION['currentUser'] . "'";
			}
			if ($journals=$conn->query($sql)){
				while ($journal=mysqli_fetch_row($journals)){
					printf ("%s|||%s|| ||", $journal[0], $journal[1]);
				}

			}
		} 
	} else if($_POST['type'] == "user"){
		$sql="SELECT * FROM users";
		if ($users=$conn->query($sql)){
			while ($user=mysqli_fetch_row($users)){
				echo $user[0];
				echo "|||";
				echo $user[1];
				echo "|| ||";
			}
		}
	} else if($_POST['type'] == "usersdsd"){
		if(!isset($_SESSION['currentUser'])){
            echo "LOGIN FIRST";
        } else {
        	//if($_SESSION['currentUser'] == "admin"){
    		$sql="SELECT * FROM users";
        	//} else {
			//	$sql="SELECT * FROM journals WHERE creator LIKE '" . $_SESSION['currentUser'] . "'";
			//}
			if ($users=$conn->query($sql)){
				while ($users=mysqli_fetch_row($users)){
					printf ($user[0], $user[1]);
					//$_SESSION['currentUser'] = $journal[0];
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