<?php
session_start();

if($_POST['action'] == "set"){
	$_SESSION[$_POST['variableName']] = $_POST['data'];
}else if($_POST['action'] == "destroy"){
	if(isset($_SESSION['currentUser'])){
		unset($_SESSION['currentUser']);
	}
}else if($_POST['action'] == "logout"){
	if(isset($_SESSION['currentUser'])){
		unset($_SESSION['currentUser']);
	}
}
?>