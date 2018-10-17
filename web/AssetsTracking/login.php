<?php
	include("DatabaseConnect.php");

	$user_name = $db->query("select user_name from users where user_name = '" . $_POST["user_name"] . "'");

	foreach ($user_name as $row) {
		if (isset($row["user_name"])) {
			session_start();
			$_SESSION["user_name"] = $row["user_name"];
		}
	}

	// echo $user_name;

	// if (isset($user_name["user_id"])) {
		// session_start();
		// $_SESSION["user_name"] = $user_name["user_name"];
	// }

	// echo $_SESSION["user_name"];
?>