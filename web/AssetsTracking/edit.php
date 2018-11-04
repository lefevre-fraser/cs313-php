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

		$new_asset_value = $asset["asset_value"];
		$quantity = $asset["quantity"];

		$queryString  = "select change_user_asset(";
		$queryString .= "  :userid";
		$queryString .= ", :assetid";
		$queryString .= ", :newassetvalue";
		$queryString .= ", :oldassetvalue";
		$queryString .= ", :quantity";
		$queryString .= ")";

		$query = $db->prepare($queryString);
		$query->bindValue(':userid',        $user_id,         PDO::PARAM_INT);
		$query->bindValue(':assetid',       $assetid,         PDO::PARAM_INT);
		$query->bindValue(':newassetvalue', $new_asset_value, PDO::PARAM_INT);
		$query->bindValue(':oldassetvalue', $old_asset_value, PDO::PARAM_INT);
		$query->bindValue(':quantity',      $quantity,        PDO::PARAM_INT);
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
		$queryString .= " where user_id = :userid";
		$queryString .= " and asset_id = :assetid";
		$queryString .= " and asset_value = :oldassetvalue";

		$query = $db->prepare($queryString);
		$query->bindValue(':userid',        $user_id,         PDO::PARAM_INT);
		$query->bindValue(':assetid',       $asset_id,        PDO::PARAM_INT);
		$query->bindValue(':oldassetvalue', $old_asset_value, PDO::PARAM_INT);
		$query->execute();
		$result = $query->fetchAll();
	}
}

header("Location: AssetTracker.php");
exit;

?>