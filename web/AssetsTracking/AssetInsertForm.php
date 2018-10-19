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

		echo '<div class="container h-100 d-flex justify-content-center">';
		echo '<form action="insert.php" method="post">';
		echo '<label>Asset Name:</label><br>';
		echo '<input type="text" name="asset_name" placeholder="Couch"><br>';
		echo '<label>Quantity:</label><br>';
		echo '<input type="number" name="quantity" value="1"><br>';
		echo '<label>Unit Value:</label><br>';
		echo '<input type="number" name="asset_value" placeholder="20">';
		echo '<button type="submit" class="btn btn-block">Add Item To Assets</button>'
		echo '</form>';
		echo '</div>';

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