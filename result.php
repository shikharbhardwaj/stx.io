<!doctype html>
<html lang = "en">
<body>
	<head>
		<title>STX | Result</title>
	</head>
	<body>
	<progress id = "prog" max = "100"></progress>
	<?php
		if(isset($_GET['errid'])){
			if($_GET['errid']==1){
				echo "The code did not compile successfully!";
				exit();
			}
		}
		if($_SESSION['res'][$qno] == 1){
			echo "Correct answer";
			echo "<script type = 'text/Javascript'>var res = 1</script>";
			try{
				$con = new PDO("mysql:host=localhost;dbname=webuser","webuser","phprocks");
				$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$con->exec("use webuser");
				$con->exec("set names 'UTF8'");
			}
			catch(Exception $e){
				echo "Failed to update scores. Error : ".$e->getMessage();
				exit();
			}
			$query = "update teams set marks = marks+100 where teamno = ".$_SESSION['userid'];
			$con->exec($query);
		}
		else{
			echo "Incorrect answer";
			echo "<script type = 'text/Javascript'>var res = 1</script>";
		}
		?>
		<script type="text/javascript">
		if(res==1){
			document.getElementById('prog').value = 100;
			document.getElementById('prog').style = "color:red";
		}
		else{
			document.getElementById('prog').value = 30;	
			document.getElementById('prog').style = "color:green";
		}
		</script>
	</body>
</html>