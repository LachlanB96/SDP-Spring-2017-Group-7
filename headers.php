<?php
session_start();
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<?php 
if($_SESSION['theme'] == 'dark'){ ?>
<link rel="stylesheet" href="css/style1.css">
<?php
} else{ ?>
<link rel="stylesheet" href="css/style.css">
<?php } ?>
