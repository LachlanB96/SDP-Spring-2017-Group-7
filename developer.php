<html>
<head>
	<?php
	include("headers.php");
	?>
</head>
<body>
	<?php
	include("navigation.php");
	?>
	<div class="container">
		<div class="jumbotron">
			<a type="button" class="btn btn-warning btn-block" id="loadDatabase">Load Users Table</a>
			<p id="databaseShow">Empty</p>
			<a type="button" class="btn btn-warning btn-block" id="writeDatabase">Write Database</a>
			Username:<input type="text" name="username" value="default" id="inputUsername"><br>
			Password:<input type="text" name="password" value="abc" id="inputPassword"><br>
			<a type="button" class="btn btn-warning btn-block" id="readJournalTable">Load Journals Table</a>
			<p id="journalsTableShow">Empty</p>
			<a type="button" class="btn btn-danger btn-block" id="truncTable">Trunc Users Table</a>
			<?php
			session_start();
			var_dump($_SESSION);
			var_dump($_POST);
			?>
		</div>
	</div>
	<script>
		$("#loadDatabase").click(function(){
			$.post("readDB.php",
			{
				action: "read",
				table: "users"
			},
			function(data, status){
				$("#databaseShow").html(data);
			});
		});
		$("#writeDatabase").click(function(){
			$.post("readDB.php",
			{
				action: "write",
				username: $("#inputUsername").val(),
				password: $("#inputPassword").val()
			},
			function(data, status){
				$("#databaseShow").html(data);
			});
		});
		$("#truncTable").click(function(){
			$.post("readDB.php",
			{
				action: "trunc"
			},
			function(data, status){
				$("#databaseShow").html(data);
			});
		});
		$("#readJournalTable").click(function(){
			$.post("readDB.php",
			{
				action: "read",
				table: "journals"
			},
			function(data, status){
				$("#journalsTableShow").html(data);
			});
		});
	</script>
</body>
</html>