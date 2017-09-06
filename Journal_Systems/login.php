<html>
<head>
<title>Login</title>
<style>
body {	
	width:100%;
	margin: 0;
	background-color:#a9a9a9;
}
div.bodytab {			
	position: relative;	
	width: 300px;
	height: 150px;
	background-color: #d5d5d5;
	padding: 2em;	
	left:435px;
    top:120px;
}
span {
	font-size: 30px;
	font-weight: bold;
}
</style>
<script type="text/javascript">
function validate_form(){
	var username_check = document.getElementById("username");
	var passwords_check = document.getElementById("passwords");
	if(username_check.value == "")
		alert("Please input username!");
	else if(passwords_check.value == "")
		alert("Please input passwords!");
	else
		document.forms['homepage'].submit();
}
</script>
</head>
<body>
<div class="bodytab">
<form name="homepage" action="homepage.php" method="post">
<table cellpadding="5">
<tr><span>Wilder's Journal</span></tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<tr><td>Username: </td>
<td><input type="text" name="username" id="username"></td></tr>
<tr><td>Passwords: </td>
<td><input type="text" name="passwords" id="passwords"></td></tr>
</table cellpadding="3">
</form>
<table>
<tr><td><a href="signup.php" style="font-size:10px">New Account </a></td><td>|</td>
<td><a href="findpassword.php" style="font-size:10px"> Forgot Password?</a></td>
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
<td align="right"><input type="submit" name="login" value="Login" onclick="return validate_form()"></td></tr>
</table>
</div>
</body>
</html>