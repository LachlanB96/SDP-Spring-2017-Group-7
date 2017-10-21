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
}else if($_POST['action'] == "toggleTheme"){
	echo "yy";
	if(!isset($_SESSION['theme'])){
		$_SESSION['theme'] = 'dark';
	}
	else if($_SESSION['theme'] == 'dark'){
		$_SESSION['theme'] = 'default';
	}
	else if($_SESSION['theme'] == 'default'){
		$_SESSION['theme'] = 'dark';
	}
}
?>