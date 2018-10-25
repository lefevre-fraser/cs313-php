<?php
session_start();

$user_id = $_SESSION["user_id"];
include_once("DatabaseConnect.php");

if (isset($_POST["update"])) {
	foreach ($_POST["assets"] as $asset_identify) {
		$asset = preg_split("/\\$/", $asset_identify);
		$asset_id = $asset[0];
		$old_asset_value = $asset[1];

		$asset = $_POST[$asset_identify];

		$new_asset_value = $_POST[$asset]["asset_value"];
		$quantity = $_POST[$asset]["quantity"];

		$queryString  = "select change_user_asset(";
		$queryString .=        $user_id;
		$queryString .= ", " . $asset_id;
		$queryString .= ", " . $old_asset_value; 
		$queryString .= ", " . $new_asset_value;
		$queryString .= ", " . $quantity;
		$queryString .= ")";

		$query = $db->prepare($queryString);
		$query->execute();
		$error_code = $query->fetchAll();

		$_SESSION["change_error"] = $error_code[0]["change_user_asset"];
	}
} else if (isset($_POST["delete"])) {
	foreach ($_POST["assets"] as $asset_identify) {
		$asset = preg_split("/\\$/", $asset_identify);
		$asset_id = $asset[0];
		$old_asset_value = $asset[1];

		$asset = $_POST[$asset_identify];

		$queryString  = "delete from user_assets";
		$queryString .= " where user_id = "   . $user_id;
		$queryString .= " and asset_id = "    . $asset_id;
		$queryString .= " and asset_value = " . $old_asset_value; 

		$query = $db->prepare($queryString);
		$query->execute();
		$result = $query->fetchAll();
	}
}

header("Location: AssetTracker.php");
exit;

?>