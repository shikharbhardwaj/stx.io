<?php
try{
	$con = new PDO("mysql:host = localhost;dbname = webuser","webuser","phprocks");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$con->exec("use webuser");
	$con->exec("set names 'UTF8'");
}
catch(Exception $e){
	header("location:error.php?id=2");
}
try{
for($i=1;$i<=30;$i++){
	for($k=1;$k<=10;$k++){
		$con->exec("insert into questions values(".$i.",".$k.", 0, 0)");
	}
}
}
catch(Exception $e){
	echo $e->getmessage();
}