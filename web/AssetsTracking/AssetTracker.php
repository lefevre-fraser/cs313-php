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

	$queryString =  "select a.asset_name, ua.quantity, ua.asset_value";
	$queryString += " from user_assets ua inner join assets a";
	$queryString += " on ua.asset_id = a.asset_id";
	$queryString += " where ua.user_id = " . $_SESSION["user_id"];

	foreach ($db->query($queryString) as $row) {
		echo "<p>Asset: " . $row["asset_name"] . "\n";
		echo "Quantity: " . $row["quantity"] . "\n";
		echo "Asset Value: " . $row["asset_value"] . "</p>";
	}
}
else {

echo 
	'
	<form action="login.php" method="post">
		<label>User Name:</label>
		<input type="text=" size="40" name="user_name">
	</form>	
	';
}

?>


</body>
</html>