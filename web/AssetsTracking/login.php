<?php
	session_start();

	include_once("DatabaseConnect.php");

	$queryString  = "select s.salt_value";
	$queryString .= " from salts s inner join users u";
	$queryString .= " on s.salt_id = u.salt_id";
	$queryString .= " where u.user_name = '" . $_POST["user_name"] . "'";

	$salt = $db->query($queryString);
	$saltString = "";
	foreach ($salt as $row) {
		$saltString = $row["salt_value"];
	}

	$options = [ 'cost' => 8, 'salt' => $saltString];
	$password = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);

	$queryString =  "select user_name, user_id, fname, lname, mname";
	$queryString .= " from users";
	$queryString .= " where user_name = '" . $_POST["user_name"] . "'";
	$queryString .= " and hashed_password = '" . $password . "'";


	$user_name = $db->query($queryString);

	foreach ($user_name as $row) {
		if (isset($row["user_name"])) {
			$_SESSION["user_name"] = $row["user_name"];
			$_SESSION["user_id"] = $row["user_id"];
			$_SESSION["full_name"] = $row["fname"];
			if (isset($row["mname"])) {
				$_SESSION["full_name"] .= " " . $row["mname"];
			}
			$_SESSION["full_name"] .= " " . $row["lname"];

			$_SESSION["login_error"] = 1;
		}
	}

	if (!isset($_SESSION["login_error"])) {
		$_SESSION["login_error"] = 0;			
	}

	header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
?>