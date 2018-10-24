<?php
session_start();

include_once("DatabaseConnect.php");

if (isset($_POST["new_user_name"])) {

	$queryString  = "select user_name from users";
	$queryString .= " where user_name = '" . $_POST["new_user_name"] . "'";

	$query       = $db->prepare($queryString);
	$query->execute();
	$queryResult = $query->fetchAll();

	if (sizeof($queryResult) > 0) {
		$_SESSION["user_name_exists"] = true;
		header("Location: NewUser.php");
		exit;
	} else {	
		$_SESSION["user_name_exists"] = false;
	}

	$queryString    = "select salt_id, salt_value from salts";
	$query          = $db->prepare($queryString);
	$query->execute();
	$queryResult    = $query->fetchAll();
	$i              = mt_rand(0, sizeof($queryResult) - 1);

	$options        = [ 'cost' => 8, 'salt' => $queryResult[$i]["salt_value"]];
	$HashedPassword = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);

	$queryString  = "select insert_user(";
	$queryString .= "'" . $_POST["new_user_name"] . "'";
	$queryString .= ", '" . $_POST["fname"] . "'";
	$queryString .= ", '" . $_POST["lname"] . "'";
	$queryString .= ", '" . $_POST["area_code"] . "'";
	$queryString .= ", '" . $_POST["phone_number"] . "'";
	$queryString .= ", " . $saltId;
	$queryString .= ", " . $HashedPassword;

	if (isset($_POST["mname"]) && $_POST["mname"] != "") {
		$queryString .= ", '" . $_POST["mname"] . "'";
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
