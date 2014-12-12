<!doctype html>
<html lang = "en">
<title>STX | Error</title>
<link rel = "shortcut icon" type="icon/PNG" href = "../favicon.ico">
<body>
<div id = "viewport">
<center>An error occured.</center>
<br>
<h2>Error</h2>
<br>
<?php
	if($_GET['id']==1){
		echo "Invalid team number.";
	}
	else if ($_GET['id']==2) {
		echo "Error establishing database connection";
	}
	else if($_GET['id']==3){
		echo "User does not exist or the user has already logged in.<br>This system only supports one login per user for obvious reasons.";
	}
	else if($_GET['id']==4){
		echo "There was an error in checking the submission.<br><a href = '../judge'>Go back</a>";
	}
?>
</div>