<?php
session_start();
if($_POST['action'] == "set"){
	$_SESSION[$_POST['variableName']] = $_POST['data'];
}
?>