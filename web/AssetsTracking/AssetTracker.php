<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Asset Tracker</title>

	<?php 
	include_once("BootStrapHeader.php"); 
	echo $BootStrapHeader;
	?>

	<link rel="stylesheet" type="text/css" href="AssetTracker.css">
	<script type="text/javascript" src="AssetTracker.js"></script>
</head>
<body>

	<?php 

	if (isset($_SESSION["login_error"]) && $_SESSION["login_error"]) {
		echo '<div id="main_div" class="container">';

		include_once("header.php");
		echo $header;

		echo "<form action='AssetTracker.php' method='post'>";
		echo "<label>Search by Asset Name:</label><br>";
		echo "<input name='search_context' type='text' placeholder='Couch'><br>";

		echo "<label>Order By:</label><br>";
		echo "<select name='order_by'>";
		echo "<option value='asset_name'>Asset Name</option>";
		echo "<option value='quantity'>Quantity</option>";
		echo "<option value='asset_value'>Unit Value</option>";
		echo "</select><br><br>";

		echo "<button type='submit'>Search</button><br>";
		echo "</form><hr>";

		include_once("DatabaseConnect.php");

		$queryString =  "select a.asset_name, a.asset_id, ua.quantity, ua.asset_value";
		$queryString .= " from user_assets ua inner join assets a";
		$queryString .= " on ua.asset_id = a.asset_id";
		$queryString .= " where ua.user_id = " . $_SESSION['user_id'];

		if (isset($_POST["search_context"])) {
			$queryString .= " and UPPER(a.asset_name) like '%" . strtoupper($_POST["search_context"]) . "%'";
		}

		if (isset($_POST["order_by"])) {
			if ($_POST["order_by"] == "asset_name") {
				$queryString .= " order by a.asset_name, ua.quantity, ua.asset_value";
			} else if ($_POST["order_by"] == "quantity") {
				$queryString .= " order by ua.quantity, a.asset_name, ua.asset_value";
			} else if ($_POST["order_by"] == "asset_value") {
				$queryString .= " order by ua.asset_value, a.asset_name, ua.quantity";
			}
		} else {
			$queryString .= " order by a.asset_name, ua.quantity, ua.asset_value";
		}

		$user_assets = $db->query($queryString);

		echo "<form action='edit.php' method='post'>";
		echo "<button type='submit' name='update'>Update Assets</button>";
		echo "<button type='submit' name='delete' onclick=\"return confirmDelete();\">Delete Assets</button>";

		echo "<table class='table'><p></p><thead class='thead-dark'><tr>";
		echo "<th class='col text-nowrap'>Asset Name</th>";
		echo "<th class='col text-nowrap'>Quantity</th>";
		echo "<th class='col text-nowrap'>Unit Value</th>";
		echo "<th class='col text-nowrap'>Total Value</th>";
		echo "</tr></thead><tbody>";

		$total = 0;

		foreach ($user_assets as $row) {
			$UniqueName = $row["asset_id"] . "$" . $row["asset_value"];
			$quantity = $row['quantity'];
			$asset_name = $row["asset_name"];
			$asset_value = $row['asset_value'];

			echo "<tr>";

			echo "<th scope='row'>";
			echo "<input type='checkbox' name='assets[]' value='" . $UniqueName . "' id='" . $UniqueName . "'>";
			echo "<label class='tab'>$asset_name</label>";
			echo "</th>";

			echo "<td>";
			print("<input type=\"number\" value=\"$quantity\" name=\"" . $UniqueName . "[quantity]\" onchange=\"check('$UniqueName')\" class=\"light-grey\">");
			echo "</td>";

			echo "<td class='text-nowrap'>$";
			print("<input type=\"number\" value=\"$asset_value\" name=\"" . $UniqueName . "[asset_value]\" onchange=\"check('$UniqueName')\" class=\"light-grey\">");
			echo "</td>";

			echo "<td>$" . ($row["quantity"] * $row["asset_value"]) . "</td>";

			echo "</tr>";
			$total += ($row["quantity"] * $row["asset_value"]);
		}

		echo "<thead class='thead-dark'><tr><th scope='row'>Total Asset Worth</th>";
		echo "<th colspan=\"2\"></th>";
		echo "<th>$" . $total . "</th></tr></thead>";
		echo "</tbody></table>";

		echo "<button type='submit' name='update'>Update Assets</button>";
		echo "<button type='submit' name='delete' onclick=\"return confirmDelete();\">Delete Assets</button>";
		echo "</form>";

		echo "</div>";
	}
	else {

		include_once("LoginPage.php");
		echo $LoginPage;

	}

	?>

	<?php
	include_once("ErrorDictionary.php");
	insert_error_scripts();
	?>

	<script type="text/javascript">
		setActive('tracker');
	</script>

	<?php 
	include_once("BootStrapFooter.php"); 
	echo $BootStrapFooter;
	?>

</body>
</html>