<?php
$con=mysqli_connect('localhost', 'root', 'mysql', 'sdp');
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($_POST['action'] == "read"){
	$sql="SELECT * FROM " . $_POST['table'];
	if ($result=mysqli_query($con,$sql)){
		while ($row=mysqli_fetch_row($result)){
			echo ($row[0] . " | " . $row[1]);
			echo ("|||");
		}
		mysqli_free_result($result);
	}
}
if($_POST['action'] == "write"){
	$sql = "INSERT INTO users (username, password)
	VALUES ('" . $_POST['username'] . "', '" . $_POST['password'] . "')";
	mysqli_query($con,$sql);
}
if($_POST['action'] == "trunc"){
	$sql = "TRUNCATE TABLE users";
	mysqli_query($con,$sql);
}
mysqli_close($con);

?>