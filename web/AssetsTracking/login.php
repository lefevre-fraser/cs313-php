<?php
	include_once "DatabaseConnect.php"

	$user_name = $db->query("select user_id from users where user_name = " . $_POST["user_name"]);

	if (isset($user_name["user_name"])) {
		session_start();
		$_SESSION["user_name"] = $user_name["user_name"];
	}

}
catch (PDOException $ex)
{
	echo 'Error!: ' . $ex->getMessage();
	die();
}


?>