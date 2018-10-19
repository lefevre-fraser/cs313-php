<?php
	include("DatabaseConnect.php");

	$user_name = $db->query("select user_name, user_id, fname, lname, mname from users where user_name = '" . $_POST["user_name"] . "'");

	foreach ($user_name as $row) {
		if (isset($row["user_name"])) {
			session_start();
			$_SESSION["user_name"] = $row["user_name"];
			$_SESSION["user_id"] = $row["user_id"];
			$_SESSION["full_name"] = $row["fname"];
			if (isset($row["mname"])) {
				$_SESSION["full_name"] .= " " . $row["mname"];
			}
			$_SESSION["full_name"] = $row["lname"];
		}
	}

	header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
?>