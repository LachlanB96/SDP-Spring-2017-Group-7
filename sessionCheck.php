<?php
session_start();

if(!isset($_SESSION['currentUser'])){
	header('Location: '. 'forbidden.php');
}
?>