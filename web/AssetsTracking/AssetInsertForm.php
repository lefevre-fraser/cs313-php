<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Asset Insert Page</title>

	<?php 
	include_once("BootStrapHeader.php"); 
	echo $BootStrapHeader;
	?>

	<link rel="stylesheet" type="text/css" href="AssetTracker.css">
	<script type="text/javascript" src="AssetTracker.js"></script>
</head>
<body>

	<?php 

	if (isset($_SESSION["login"]) && $_SESSION["login"]) {
		echo '<div id="main_div" class="container">';

		include_once("header.php");
		echo $header;



		echo "</div>";
	}
	else {

		include_once("LoginPage.php");
		echo $LoginPage;

	}

	?>

	<?php 
	include_once("BootStrapFooter.php"); 
	echo $BootStrapFooter;
	?>


</body>
</html>