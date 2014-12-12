<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
if(isset($_SESSION['logged']) && $_SESSION['logged']==1){
	header("location:../judge/");
}
if(!isset($_POST['team'])){
	echo "Error logging in. Form data not recieved.";
	exit();
}
$team = $_POST['team'];
$p = $_POST['pass'];
if($team==''){
	header("location:../error/?id=1");
}
 if(strcmp($p,"itsepic")){
 	echo "You should think twice before trying this again.<br>Twice";
 	exit();
 }
try{
	$con = new PDO("mysql:host = localhost;dbname = webuser","webuser","phprocks");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$con->exec("use webuser");
	$con->exec("set names 'UTF8'");
}
catch(Exception $e){
	header("location:../error/?id=2");
}
$query = $con->prepare("select teamno, logged from teams where teamno = ?");
$query->execute(array($team));
while($r=$query->fetch()){
  $teamno = $r['teamno'];
  $logged = $r['logged'];
}
if($team==$teamno && $logged!=1){
	$_SESSION['userid'] = $team;
	chdir("attempts\\".$team);
	$_SESSION['logged'] = 1;
	$_SESSION['qdata'] = array();
	$_SESSION['init'] = time();
	$_SESSION['correct'] = array();
	for($i = 1;$i<=9;$i++){
		$_SESSION['qdata'][$i] = 0;
		$_SESSION['correct'][$i] = 0;
	}
	$q2 = $con->query("select qno,attempts from questions where teamno = ".$team);
	while($r = $q2->fetch()){
		if($r['attempts']!=0){
			$_SESSION['qdata'][$r['qno']] = $r['attempts'];
		}
	}
	$con->exec("update teams set logged = 1 where teamno = ".$team);
	$con->exec("update teams set time = ".time()." where teamno = ".$team);
	header("location:../judge/");
}
else{
	session_destroy();
	header("location:../error/?id=3");
}
?>
