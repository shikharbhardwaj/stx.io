<!DOCTYPE html>
<html>
<head>
	<title>Submission summary</title>
	<link rel = "stylesheet" type = "text/CSS" href = "../style.css"/>
	<meta charset = "UTF-8"/>
	<style>
		<style type="text/css">
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
			}
			#leaderboard h3{
				position: relative;
				display: inline-block;
				left: 00%;
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
	</style>
</head>
<body>
	<div id = "container">
		<div id = "content">
			<h2>Submission result</h2>
			<?php
			session_start();
			if(!isset($_SESSION['logged'])){
				header("location:../index");
			}
			$qno = $_POST['ques'];
			$_SESSION['qdata'][$qno]++;
			$at = $_SESSION['qdata'][$qno];
			$userid = $_SESSION['userid'];
			chdir("attempts");
			$filepath = $userid."\\".$qno.$at.".txt";
			if (!is_uploaded_file($_FILES['fup']['tmp_name']) or	!copy($_FILES['fup']['tmp_name'], $filepath)){
				$file = fopen($filepath, "w+");
				fwrite($file,$_POST['incode']);
				fclose($file);
			}
			if(!file_exists($filepath)){
				header("location:../error");
				exit();
			}
//Using input file as ind(qno).txt placed in attempts. Placing the generated output in the 
//user folder with name (qno)(attemptno)out.txt
			if(file_exists($filepath)) {
				$lines = count(file("IO\\outputs\\o".$qno.".txt")); 
				$correct = 0;
				$output = fopen($filepath, "r");
				$des = fopen("IO\\outputs\\o".$qno.".txt", "r");
				if($des && $output && $lines){
					while (($linp = fgets($output)) !== false && ($lind = fgets($des)) !== false) {
						if(!strcmp($linp, $lind)){
							$correct++;
						}
						else{
							break;
						}
					}
					fclose($output);
					fclose($des);
					$p = ($correct*100/$lines);
					//echo "You got ".$p."% outputs correct!";
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
					$query = $con->query("select accuracy,attempts from questions where teamno = ".$userid." and qno = ".$qno);
					$prevacur=0;
					$attempts = 0;
					while($r = $query->fetch()){
						$prevacur = $r['accuracy'];
						$attempts = $r['attempts'];
					}
					$attempts++;
					$con->exec("update questions set attempts = attempts + 1 where teamno = ".$userid." and qno = ".$qno);
					$q1 = $con->query("select marks from maxmark where qno = ".$qno);
					$maxmark = 0;
					while($r = $q1->fetch()){
						$maxmark = $r['marks'];
					}
					$award = 0;
					if($prevacur<=$p){
						$con->exec("update questions set accuracy = ".$p." where teamno = ".$userid." and qno = ".$qno);
						$award = $maxmark * (($p - (10*($attempts-1))) / 100);
						$con->exec("update questions set marksawarded = ".$award." where teamno = ".$userid." and qno = ".$qno);
					}
					else{
						echo "<script>window.onload = function(){window.alert('This was less accurate than the previous attempt. 0 awarded.');}</script>";
						$award = 0;
						$con->exec("update questions set marksawarded = ".$award." where teamno = ".$userid." and qno = ".$qno);
					}
					$q3 = $con->query("select sum(marksawarded) from questions where teamno = ".$userid);
					$marks = 0;
					while($r = $q3->fetch()){
						$marks = $r['sum(marksawarded)'];
					}
					$con->exec("update teams set marks = ".$marks." where teamno = ".$userid);
					$q4 = $con->query("select count(*) from teams where marks>=".$marks." order by marks");
					while($r = $q4->fetch()){
						$rank = $r['count(*)'];
					}
		//echo "The marks you got for the question : ".$award;
					echo "<script type= 'text/Javascript'>var p = ".$p."</script> ";
				}
			}
			else{
				header("location:../error");
				exit();
			}
			?>
			<h4 style="position:absolute;top:50px; right:50px">Team number : <?php echo $_SESSION['userid'] ?></h4>
			<span id = "qno">Question number : <?php echo $qno?></span>
			<br>
			<div id = "prev">
				<h3>Previous attempts</h3>
				<span id = "noa">Number of attempts made : <?php echo $attempts-1?></span>
				<span id = "prevac">Best accuracy : <?php echo $prevacur?></span>
			</div>
			<div id = "curr">
				<h3>This attempt</h3>
				<span id = "nowac">Accuracy : <?php echo $p?></span>
				<span id = "award">Marks awarded : <?php echo $award?></span>
				<span id = "totmark">Total marks : <?php echo $marks?></span>
				<span id = "rank">Rank : <?php echo $rank ?></span>
			</div>
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
			<a href = "../judge/" style="position:absolute;top:500px;left:70px;">Back</a>
		</div>
		<script type="text/javascript">
			window.onload = function() {
				if(p==100){
					window.alert("You got this one absolutely correct.");
				}
				else if(p<100 && p>80){
					window.alert("Good effort. Try again to get the perfect score!");
				}
				else if(!p){
					window.alert("No output correct. Please check the output format.");
				}
				else{
					window.alert("Read the problem carefully for the boundry conditions.");
				}
			}
		</script>
	</div>
</body>
</html>