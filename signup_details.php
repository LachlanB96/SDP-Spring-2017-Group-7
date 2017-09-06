<?php
$link = mysqli_connect('localhost', 'root', 'mysql', 'SDP');
if(!$link)
	die("Could not connect to Server");

$username = $_POST['username'];
$passwords = $_POST['passwords'];

$query1 = "SELECT * FROM users";
$result1 = mysqli_query($link,$query1);
$num_rows = mysqli_num_rows($result1);
$newusername = true;

if($num_rows>0)
{
	while($row = mysqli_fetch_row($result1))
	{
		if($row[0] == $username)
		{
			$newusername = false;
		}
	}
	if(!$newusername)
	{
		echo "The username is already existent!";
	}
	else
	{	
		$query2 = "INSERT INTO users (username, passwords)
				VALUES ('".$username."', '".$passwords."')";	
		$result2 = mysqli_query($link,$query2);
		if($result2)
		{
			echo "New account has been created successfully";
		}		
		else
		{			
			echo "Error: " . $query2 . "<br>" . $link->error;
		}
	}
}
else
{
	echo "No data to display!";
}
mysqli_close($link);
?>
