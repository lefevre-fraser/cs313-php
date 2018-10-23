<?php
session_start();

include_once("DatabaseConnect.php");

if (isset($_POST["new_user_name"])) {

	$queryString  = "select salt_id, salt_value from salts";
	$query = $db->prepare($queryString);
	$query->execute();
	$queryResult = $query->fetchAll();
	$i = mt_rand(0, sizeof($queryResult));
	$queryResult[$i]["salt_id"];

	$queryString  = "select insert_user(";
	$queryString .= "'" . $_POST["new_user_name"] . "'";
	$queryString .= "'" . $_POST["fname"] . "'";
	$queryString .= "'" . $_POST["lname"] . "'";
	$queryString .= "'" . $_POST["area_code"] . "'";
	$queryString .= "'" . $_POST["phone_number"] . "'";
	$queryString .= $saltId;
	$queryString .= $HashedPassword;

	if (isset($_POST["mname"])) {
		$queryString .= "'" . $_POST["mname"] . "'";
	}

	$queryString .= ")";

	$completed = $db->query($queryString);

	header("Location: AssetTracker.php");
	exit;

} else {

	$queryString  = "select insert_asset(";
	$queryString .= "'" . $_SESSION["user_name"] . "'";
	$queryString .= ", " . $_POST["quantity"];
	$queryString .= ", " . $_POST["asset_value"];
	$queryString .= ", '" . $_POST["asset_name"] . "'";
	$queryString .= ")";

	$completed = $db->query($queryString);

	header("Location: AssetInsertForm.php");
	exit;

}
?>
