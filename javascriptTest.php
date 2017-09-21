<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>My Bookings</title>
</head>
<body>
	<div id="page">
	<?php
	session_start();
	echo "<br />";
	echo $_POST['action'];
	echo "<br />";
	if(isset($_POST)){
		var_dump($_POST);
		echo "<br />";
		$_SESSION['a'] = $_POST['action'];
	}
	var_dump($_SESSION);
	echo "<br />";
	?>
	<a type="button" class="btn post" action="test">Click me!!</a>
	<a type="button" class="btn post" action="111111111">Click me! 1</a>
	<a type="button" class="btn btn-warning btn-outline btn-cancel" href="javascriptTest.php">New Search</a>
	</div id="page">
</body>
<script type="text/javascript">
	$(".post").click(function(){
		var $action = $(this);
		console.log($(this));
		$.post("javascriptTest.php",
		{
			action: $action.attr('action'),
			yffy: "rssrrs"
		},
		function(data, status){
			$("#page").html(data);
		});
	});
</script>
</html>