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
	<form action="index.html" class="login">
		<h1>Sign In</h1>
		<input type="email" name="email" placeholder="Email Address" autofocus>
		<input type="password" name="password" placeholder="Password">
		<input type="submit" value="Login">
		<p><a href="404.html">Forgot password?</a></p>
		<p><a href="signin.php">Sign In</a></p>
		<h1>Debug Sign In Controls</h1>
		<a type="button" class="btn btn-success" id="debugUserSignIn">Sign in as user 'default'</a>
	</form>
	<script type="text/javascript">
		$("#debugUserSignIn").click(function(){
			$.post("sessionData.php",
			{
				action: "set",
				variableName: "username",
				data: "default"
			});
			window.location.href = "home.php";
		});
	</script>
</body>
</html>
