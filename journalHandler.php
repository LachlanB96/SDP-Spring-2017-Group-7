<?php
$con=mysqli_connect('localhost', 'root', 'mysql', 'sdp');
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo var_dump($_POST);

if($_POST['action'] == "read"){
	if($_POST['type'] == "entry"){
		if($_POST['journalName'] == "test1"){
			$sql="SELECT * FROM journalEntries WHERE journal LIKE 'test1'";
			if ($result=mysqli_query($con,$sql)){
				while ($row=mysqli_fetch_row($result)){
					echo ($row[0] . " | " . $row[4]);
					echo ("|||");
				}
				mysqli_free_result($result);
			}
		}
	}
}
if($_POST['action'] == "write"){
	if($_POST['type'] == "entry"){
		$sql="INSERT INTO `sdp`.`journalEntries` (`title`, `journal`, `creator`, `contents`, `dateCreated`) 
		VALUES ('" . $_POST['entryName'] . "', '" . $_POST['journalName'] . "', '" . $_POST['creator'] . "', '" . $_POST['contents'] . "', '" . "1/1/12" . "')";
		mysqli_query($con,$sql);
	}
}
mysqli_close($con);

?>