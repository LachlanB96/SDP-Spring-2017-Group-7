<html>
<head>
<title>Sign Up</title>
<style>
body {	
	width:100%;
	margin: 0;
	background-color:#a9a9a9;
}
div.bodytab {			
	position: relative;	
	width: 300px;
	height: 350px;
	background-color: #d5d5d5;
	padding: 2em;	
	left:435px;
    top:100px;
}
p {
	font-size: 30px;
	font-weight: bold;
}
</style>
<?php
//Thinking of implementing error messages on sign-up page when the id is already existent on Database, using AJAX 
// $dom = new DomDocument;
// $id = $dom->getElementById("username")->value;
// $passwords = $dom->getElementById("passwords")->value;
 ?>
<script type="text/javascript">
function validate_form()
{	
	// $.ajax({
	// type: "POST",
	// url: "signup_details.php",
	// data: { username: "'"username_data"'", passwords: "'"passwords_data"'"},
	// success: function(data){
	// $("#wrong").html(data);	
	// }
	// });
	var username_data = document.getElementById("username").value;
	var passwords_data = document.getElementById("passwords").value;
	
	if(hasblanks())
		alert("One or more compulsory fields are blank");			
	else if(!isusernamelong(username_data))
		alert("Username must be longer than or equal to 6 characters");
	else if(!ispasswordslong(passwords_data))
		alert("Passwords must be longer than or equal to 8 characters");
	else
	document.forms['signup_details'].submit();
}
function hasblanks(){
		var compulsory_fields = new Array("username", "passwords");
	
		for(i=0; i<compulsory_fields.length; i++){
			var form_filed = document.getElementById(compulsory_fields[i]);
			if(form_filed.value == "")
				return true;
		}
		return false;
}
function isusernamelong(strtocheck){
	if(strtocheck.length >= 6)
		return true;
	return false;
}
function ispasswordslong(strtocheck){
	if(strtocheck.length >= 8)
		return true;
	return false;
}
</script>
</head>
<body>
<div class="bodytab">
<table cellpadding="3">
<form name="signup_details" action="signup_details.php" method="post">
<tr><p>Sign Up</p></tr>
<tr><td>Username: <span style="color:red">*</span></td>
<td><input type="text" name="username" id="username"></td></tr>

<tr><td>Passwords: <span style="color:red">*</span></td>
<td><input type="text" name="passwords" id="passwords"></td></tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<form name="go_back" action="login.php" method="get">
<tr><td><input value="&larr; Back" type="submit" ></input>
</form>
</td><td align="right"><input value="Create" type="button" onclick="return validate_form()"></input></td></tr>
</table>
</div>
</body>
</html>