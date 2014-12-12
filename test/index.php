<?php 
session_start();
if(isset($_SESSION['logged']) && $_SESSION['logged']==1){
	header("location:judge/");
}
?>
<!doctype html>
<html lang = "en">
<head>
	<link rel = "shortcut icon" type="icon/PNG" href = "favicon.ico">
	<link rel = "stylesheet" type = "text/CSS" href = "css\main.css"/>
	<title>STX | Login</title>
</head>
<body>
	<div id = "viewport">
		<div id = "frm">
			<h1 id = "login">Login</h1>
			<form action = "login/" method = "post">
				<input type = "text" name = "team" id = "team" placeholder = "Enter the team number" pattern = "{1,30}"/>
				<input type = "password" name = "pass" id = "pass" placeholder = "The password" required/>
				<br>
				<input type = "submit" id =  "submit" value="Login"/>
			</form>
		</div>
	</div>
</body>