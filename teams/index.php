<!doctype html>
<html lang = "en">
<head>
	<title>Team rankings</title>
	<meta charset = "UTF-8"/>
	<script type="text/javascript" src = "jq.js"></script>
	<script type="text/javascript">
		function getData (argument) {
		$.ajax({   
			type: "POST",
			url: "retrieve.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
        	$("#response").html(response); 
            //alert(response);
        }
    });
	}
	var prev = -5;
	var scrollam = 2;
	function scroll () {
		window.scrollBy(0,scrollam);
		if(scrollam>0){
			if(!(prev< pageYOffset)){
				scrollam = -1*scrollam;
			}
			else{
				prev = pageYOffset;
			}
		}
		else{
			if((!(prev> pageYOffset))){
				scrollam = -1*scrollam;
			}
			else{
				prev = pageYOffset;
			}
		}
	}
	//Number of seconds the competetion should run.
	var time = 10;
	function update () {
		time--;
		$("#clock span").html(time+" seconds left.");
		if(!time){
			window.location.replace("end.php");
		}
	}
	$(document).ready(function() {
		getData();
		window.setInterval(getData, 3000);
		window.setInterval(scroll, 50);
		window.setInterval(update,1000);
	});
</script>

<style>
	@font-face{
		font-family: main;
		src:url("bold.otf");
	}
	body{
		font-family: main;
		text-align: center;
	}
	table{
		background: #ecf0f1;
		border:1px solid black;
		font-size: 80px;
		position: relative;
		left: 0;
		margin: 0 auto 0 auto;
	}
	th{
		border:1px solid black;
	}
	tr{
		margin:0;
		border:1px solid black;
	}
	td{
		padding: 10px;
		font-size: 80px;
		text-align: center;
		width: 160px;
		border:1px solid black;
	}
</style>
</head>
<body>
	<h1>Team Rankings</h1>
	<div id = "response">

	</div>
	<div id = "clock" style="position:fixed;display:inline-block;float:right;right:25px;top:25px;font-size:60px;">
	<span id = "sec"></span>
	</div>
</body>
</html>