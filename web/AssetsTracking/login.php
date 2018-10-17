<?php
	include("DatabaseConnect.php");

	$user_name = $db->query("select user_id from users where user_name = '" . $_POST["user_name"] . "'");

	// echo $user_name;

	// if (isset($user_name["user_id"])) {
		// session_start();
		// $_SESSION["user_name"] = $user_name["user_name"];
	// }

	// echo $_SESSION["user_name"];
?>