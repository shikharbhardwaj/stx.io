<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
if(isset($_SESSION['init']) && isset($_SESSION['userid'])){
	$time = time() - $_SESSION['init'];
	try{
		$con = new PDO("mysql:host = localhost;dbname = webuser","webuser","phprocks");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->exec("set names 'UTF8'");
		$con->exec("use webuser");
	}
	catch(Exception $e){
		echo "Error establishing database connection.";
		session_destroy();
		exit();
	}
	$con->exec("update teams set time = ".time()." where teamno = ".$_SESSION['userid']);
	$con->exec("update teams set logged = 0 where teamno = ".$_SESSION['userid']);
}
session_destroy();
header("location:../");