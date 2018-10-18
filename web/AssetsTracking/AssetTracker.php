<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Asset Tracker</title>
	<link rel="stylesheet" type="text/css" href="AssetTracker.css">
	<script type="text/javascript" src="AssetTracker.js"></script>
</head>
<body>

<?php 

if (isset($_SESSION["user_name"]) && isset($_SESSION['user_id'])) {
	echo "<h1>User Name: " . $_SESSION["user_name"] . "</h1>";

	include("DatabaseConnect.php");

	$queryString =  "select a.asset_name, ua.quantity, ua.asset_value";
	$queryString .= " from user_assets ua inner join assets a";
	$queryString .= " on ua.asset_id = a.asset_id";
	$queryString .= " where ua.user_id = " . $_SESSION['user_id'];

	$user_assets = $db->query($queryString);

	echo "<table><tr><th>Asset Name</th><th>Quantity</th><th>Unit Value</th><th>Total Value</th></tr>";

	foreach ($user_assets as $row) {
		echo "<tr><td>" . $row["asset_name"] . "</td>";
		echo "<td>" . $row["quantity"] . "</td>";
		echo "<td>$" . $row["asset_value"] . "</td>";
		echo "<td>$" . ($row["quantity"] * $row["asset_value"]) . "</td></tr>";
	}

	echo "</table>";
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