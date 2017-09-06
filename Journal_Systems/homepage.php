<?php
$link = mysqli_connect('localhost', 'root', 'mysql', 'SDP');
if(!$link)
	die("Could not connect to Server");

$username = $_POST['username'];
$passwords = $_POST['passwords'];

$sql = "SELECT * FROM users";
$result = mysqli_query($link,$sql);
$num_rows = mysqli_num_rows($result);

$isusernamevalid = false;
$ispasswordsvalid = false;
$isloginsuccess = false;	

if($num_rows>0){
	while($row = mysqli_fetch_row($result)){		
		if($row[0] != $username && $row[1] != $passwords)
		{
			continue;
		}
		else if($row[0] == $username && $row[1] == $passwords)
		{			
			$isusernamevalid = true;
			$ispasswordsvalid = true;	
			break;
		}
		else if($row[0] == $username && $row[1] != $passwords)
		{
			$isusernamevalid = true;
			$ispasswordsvalid = false;			
		}
	}
	if(!$isusernamevalid)
	{
		echo "Incorrect username!";
	}
	else if($isusernamevalid && !$ispasswordsvalid)
	{
		echo "Incorrect passwords!";
	}	
	else if($isusernamevalid && $ispasswordsvalid)
	{
		echo "Login Success!";
	}
	$isusernamevalid = false;
	$ispasswordsvalid = false;	
}
else
{
	echo "No data to display!";
}
mysqli_close($link);
?>
