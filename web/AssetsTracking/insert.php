<?php
session_start();

require_once("DatabaseConnect.php");

if (isset($_POST["new_user_name"])) {

	$queryString    = "select salt_id, salt_value from salts";
	$query          = $db->prepare($queryString);
	$query->execute();
	$queryResult    = $query->fetchAll();
	$i              = mt_rand(0, sizeof($queryResult) - 1);

	$salt		= $queryResult[$i]["salt_value"];
	$salt_id	= $queryResult[$i]["salt_id"];

	$options        = [ 'cost' => 8, 'salt' => $salt];
	$HashedPassword = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);

	$area_code 		= preg_split("/\(/", $_POST["phone_number"]);
	$area_code 		= preg_split("/\)/", $area_code[1]);
	$phone_number 	= preg_split("/ /", $area_code[1]);

	$area_code 		= $area_code[0];
	$phone_number 	= $phone_number[1];

	$new_user_name = $_POST["new_user_name"];
	$fname         = $_POST["fname"];
	$lname         = $_POST["lname"];
	$mname         = "";

	$queryString  = "select insert_user(";
	$queryString .= "  :newusername"; 
	$queryString .= ", :fname"; 
	$queryString .= ", :lname"; 
	$queryString .= ", :areacode"; 
	$queryString .= ", :phonenumber"; 
	$queryString .= ", :saltid"; 
	$queryString .= ", :hashedpassword"; 

	if (isset($_POST["mname"]) && $_POST["mname"] != "") {
		$mname = $_POST["mname"];
		$queryString .= ", :mname"; 
	}

	$queryString .= "  )";

	$query = $db->prepare($queryString);
	$query->bindValue(':newusername',    $new_user_name,  PDO::PARAM_STR);
	$query->bindValue(':fname',          $fname,          PDO::PARAM_STR);
	$query->bindValue(':lname',          $lname,          PDO::PARAM_STR);
	$query->bindValue(':areacode',       $area_code,      PDO::PARAM_STR);
	$query->bindValue(':phonenumber',    $phone_number,   PDO::PARAM_STR);
	$query->bindValue(':saltid',         $salt_id,        PDO::PARAM_INT);
	$query->bindValue(':hashedpassword', $HashedPassword, PDO::PARAM_STR);
	if (isset($_POST["mname"]) && $_POST["mname"] != "") {
		$query->bindValue(':mname', $mname, PDO::PARAM_STR);
	}
	$query->execute();
	$error_code = $query->fetchAll();

	$_SESSION["insert_user_error"] = $error_code[0]["insert_user"];

	if ($_SESSION["insert_user_error"] == 1) {
		header("Location: AssetTracker.php");
	} else {
		header("Location: {$_SERVER['HTTP_REFERER']}");
	}

	exit;

} else {

	$user_name   = $_SESSION["user_name"];
	$quantity    = $_POST["quantity"];
	$asset_value = $_POST["asset_value"];
	$asset_name  = $_POST["asset_name"];

	$queryString  = "select insert_asset(";
	$queryString .= "  :username"; 
	$queryString .= ", :quantity";
	$queryString .= ", :assetvalue"; 
	$queryString .= ", :assetname"; 
	$queryString .= "  )";

	$query = $db->prepare($queryString);
	$query->bindValue(':username',   $user_name,   PDO::PARAM_STR);
	$query->bindValue(':quantity',   $quantity,    PDO::PARAM_INT);
	$query->bindValue(':assetvalue', $asset_value, PDO::PARAM_INT);
	$query->bindValue(':assetname',  $asset_name,  PDO::PARAM_STR);
	$query->execute();
	$error_code = $query->fetchAll();

	$_SESSION["insert_error"] = $error_code[0]["insert_asset"];

	header("Location: AssetInsertForm.php");
	exit;

}
?>
