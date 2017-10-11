<?php
session_start();

var_dump($_POST);

if($_POST['action'] == "set"){
	$_SESSION[$_POST['variableName']] = $_POST['data'];
}
else if($_POST['action'] == "destroy"){
	if(isset($_SESSION['currentUser'])){
		unset($_SESSION['currentUser']);
	}
}
?>