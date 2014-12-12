<?php 
session_start();
if($_SESSION['logged']!=1){
	header("location:../");
}
?>
<!doctype html>
<html lang = "en">
<head>
	<title>STX | Judge</title>
	<style type="text/css">
		input[type="file"]{
			-webkit-user-modify: none;
		}
		@font-face{
			font-family:main;
			src:url("../css/thin.ttf");
		}
		body{
			position: absolute;
			top: 0;
			left: 0;
			margin:0;
			font-family: main;
			height: 100%;
			width: 100%;
			overflow-x: hidden;
			background: #435a6b;
			color: white;
			-webkit-user-select:none;
			user-drag:none;
		}
		#holder{
			resize:none;
		}
		#array{
			position: relative;
			display: inline-block;
			left:0;
			top:0;
			margin: 0 auto 0 auto;
		}
		#container{
			position: relative;
			display: inline-block;
			top:0;
			width:45%;
			margin:30px;
			margin-top: 31px;
			border:1px solid white;
			padding: 10px;
			position: relative;
			display: inline-block;
			border: none;
			padding: 10px;
			color: white;
			background: #0e83cd;
		}
		a{
			position: relative;
			left:6%;
			top: 0;
			margin:5px;
			width:30px;
			height:21px; 
			display: inline-block;
			padding: 20px 45px 20px 45px;
			background:white;
			color: #16499a ;
			text-decoration: none;
			text-align: center;
			font-weight: 800;
		}	
		a:hover{
			color:white;
			background: #16499a;
			transition:background 0.3s;
		}
		#array{
			position: relative;
			top:0;
			left: 0;
		}
		h2{
			text-decoration: overline;
		}
		input{
			position: relative;
			left: 8%;
		}
		select{
			position: relative;
			left: 13%;	
		}
		#check{
			position: absolute;
			display: inline-block;
			border: none;
			padding: 10px;
			top:104px;
			color: white;
			background: #0e83cd;
			width: 45%;
			height: 213px;
			margin:0;
		}
		#checkbt{
			position: relative;
			border: none;
			left:35%;
			width:20%;
			color: white;
			background-color: #16499a !important;
			padding: 10px;

		}
		.move{
			top:1500px;
			transition:top 2s;
		}
		#leaderboard{
			position: absolute;
			top:350px;
			left: 27%;
			width: 40%;
			height: 230px;
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
	<h4 style="position:absolute;top:50px; right:50px">Team number : <?php echo $_SESSION['userid'] ?></h4>
	<h1 style="border-bottom:5px solid white;border-top:5px solid white;margin:10px;padding-left:25px;">Mind your code</h1>
	<div id = "container">
		<div id = "array">
			<h2>Input file download</h2>
			<a download href="../attempts/IO/inputs/in1.txt">1</a>
			<a download href="../attempts/IO/inputs/in2.txt">2</a>
			<a download href="../attempts/IO/inputs/in3.txt">3</a>
			<a download href="../attempts/IO/inputs/in4.txt">4</a>
			<a download href="../attempts/IO/inputs/in5.txt">5</a>
			<a download href="../attempts/IO/inputs/in6.txt">6</a>
			<a download href="../attempts/IO/inputs/in7.txt">7</a>
			<a download href="../attempts/IO/inputs/in8.txt">8</a>
		</div>
	</div>
	<div id = "check">
		<h2>Submit a solution</h2>
		<form action = "../check/" method = "post" enctype="multipart/form-data">
			<br>Question number : 
			<select name = "ques">
				<option value = "1">1</option>
				<option value = "2">2</option>
				<option value = "3">3</option>
				<option value = "4">4</option>
				<option value = "5">5</option>
				<option value = "6">6</option>
				<option value = "7">7</option>
				<option value = "8">8</option>
			</select>
			<div id = "upload">
				<label for = "fup">Upload the output file : 
					<input type = "file" id = "fup" name = "fup" required>
				</label>
			</div>
			<br>
			<input type = "submit" value="Check" id = "checkbt">
		</form> 
	</div>
	<?php
	if(isset($_GET['errid']) && $_GET['errid']==1){
		echo "The submission failed. Please try again...";
	}
	?>
	<div id = "leaderboard">
		<h2>Leaderboard</h2>
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
		$q5 = $con->query("select teamno from teams where marks>0 order by marks DESC");
		$i=0;
		while(($r = $q5->fetch()) && $i<5){
			echo "<span id = 'rank'>".($i+1)."</span><span id = 'team'>".$r['teamno']."</span>";
			$i++;
		}
		?>
	</div>
</div>
</body>
</html>