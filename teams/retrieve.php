<?php
echo "
<div id = 'scoreboard'>
	<table>
		<th>Rank</th><th>Team</th><th>Marks</th>"
		?>
		<?php
		try{
			$con = new PDO("mysql:host=localhost;dbname=webuser","webuser","phprocks");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$con->exec("use webuser");
			$con->exec("SET NAMES 'UTF8'");
		}
		catch(Exception $e){
			echo "<h2>An error ocurred in database connection</h2><br>".$e->getMessage();
		}
		$q1 = $con->query("select teamno, marks from teams where marks>0 order by marks DESC,time");
		$i=1;
		while($r = $q1->fetch()){
			echo "<tr><td>".$i."</td><td>".$r['teamno']."</td><td>".$r['marks']."</td></tr>";
			$i++;
		}		
		echo "</table>"
		?>