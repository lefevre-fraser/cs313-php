<?php
session_start();

$user_id = $_SESSION["user_id"];
include_once("DatabaseConnect.php");

if (isset($_POST["update"])) {

} else if (isset($_POST["delete"])) {

	foreach ($_POST["assets"] as $asset_identify) {

		$asset = preg_split("/\\$/", $asset_identify);
		$asset_id = $asset[0];
		$old_asset_value = $asset[1];

		echo $asset_id;
		echo $old_asset_value;

		$asset = $_POST[$asset_identify];

		$queryString  = "delete from user_assets";
		$queryString .= " where user_id = "   . $user_id;
		$queryString .= " and asset_id = "    . $asset_id;
		$queryString .= " and asset_value = " . $old_asset_value; 

		$query = $db->prepare($queryString);
		$query->execute();
		echo json_encode($query->fetchAll());
	}

}

?>