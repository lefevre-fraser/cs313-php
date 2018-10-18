<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Asset Tracker</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="AssetTracker.css">
	<script type="text/javascript" src="AssetTracker.js"></script>
</head>
<body>

	<div id="main_div" class="container-fluid">

		<?php 

		if (isset($_SESSION["user_name"]) && isset($_SESSION['user_id'])) {
			echo "<h1>User Name: " . $_SESSION["user_name"] . "</h1>";
			echo "<a href='logout.php' class='btn'>Log Out</a>";

			include("DatabaseConnect.php");

			$queryString =  "select a.asset_name, ua.quantity, ua.asset_value";
			$queryString .= " from user_assets ua inner join assets a";
			$queryString .= " on ua.asset_id = a.asset_id";
			$queryString .= " where ua.user_id = " . $_SESSION['user_id'];

			$user_assets = $db->query($queryString);

			echo "<table class='table'><thead><tr>";
			echo "<th class='col'>Asset Name</th>";
			echo "<th class='col'>Quantity</th>";
			echo "<th class='col'>Unit Value</th>";
			echo "<th class='col'>Total Value</th>";
			echo "</tr></thead><tbody>";

			foreach ($user_assets as $row) {
				echo "<tr><th class='row'>" . $row["asset_name"] . "</th>";
				echo "<td>" . $row["quantity"] . "</td>";
				echo "<td>$" . $row["asset_value"] . "</td>";
				echo "<td>$" . ($row["quantity"] * $row["asset_value"]) . "</td></tr>";
			}

			echo "</tbody></table>";
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

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>