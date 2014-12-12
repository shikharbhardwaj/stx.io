<?php
	chdir("../");
	exec("copy judge.php old\\judge.php");
	exec("copy index.php old\\index.php");
	exec("copy check.php old\\check.php");
	exec("copy ended\\judge.php judge.php");
	exec("copy ended\\index.php index.php");
	exec("copy ended\\check.php check.php");
	header("location:../");