<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Asset Tracker</title>
	<script type="text/javascript" src="AssetTracker.js"></script>
</head>
<body>

<?php 

if (isset($_SESSION["user_name"])) {
	echo "<h1>User Name: " . $_SESSION["user_name"] . "</h1>";

	include_once "DatabaseConnect.php";

	// foreach ($db->query("select * from ") as $row) {
	// 	# code...
	// }
}
else {

echo 
	'
	<form action="login.php" post>
		<label>User Name:</label>
		<input type="text=" size="40" name="user_name">
	</form>	
	';
}

?>


</body>
</html>