<!DOCTYPE html>
<html>
<head>
	<title>Time over</title>
	<style type="text/css">
		@font-face{
			font-family: main;
			src:url("CSS/hel.otf");
		}
		body{
			position: absolute;
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;
			background: #435a6b;
			margin: 0;
			font-family: main;
		}
		#message{
			position: relative;
			width: 60%;
			left: 20%;
			color: white;
		}
		#message h1{
			width: auto;
			text-align: center;
		}
		#leaderboard{
			position: relative;
			top:0;
			left: 15%;
			width: 70%;			
			padding: 20px;
			margin: 20px;
			color: white;
			background: #0e83cd;	
			text-align: center;
		}
		#leaderboard h3{
			position: relative;
			display: inline-block;
			left: 0%;
			width: 25%;
			margin: 5px;
			border-bottom: 1px solid white;
			border-right: 1px solid white;
		}
		#rank{
			position: relative;
			display: inline-block;
			top:0;
			left: 0;
			width: 35%;
		}
		#team{
			position: relative;
			display: inline-block;
			width: 35%;
			margin: 3px;
		}
	</style>
</head>
<body>
	<div id = "message">
		<h1>The competetion has ended. Thanks for participating!</h1>
		<div id = "leaderboard">
			<h2>Final standings</h2>
			<h3>Rank</h3><h3>Team Number</h3>
			<br>
			<?php
			try{
				$con = new PDO("mysql:host = localhost;dbname = webuser","webuser","phprocks");
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$con->exec("use webuser");
				$con->exec("set names 'UTF8'");
			}
			catch(Exception $e){
				header("location:../error?id=2");
				exit();
			}
			$q5 = $con->query("select teamno from teams order by marks DESC");
			$i=0;
			while(($r = $q5->fetch())){
				echo "<span id = 'rank'>".($i+1)."</span><span id = 'team'>".$r['teamno']."</span>";
				$i++;
			}
			?>
		</div>
	</div>
</body>
</html>
