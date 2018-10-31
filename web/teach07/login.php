<?php
session_start();

include_once("DatabaseConnect.php");

$user_name = $_POST["user_name"];
$password  = $_POST["password"];

$queryString  = " select hashed_password, user_name from users_1";
$queryString .= " where user_name = :username";

$query = $db->prepare($queryString);
$query->bindValue(':username', $user_name, PDO::PARAM_STR);
$query->execute();

$results = $query->fetchAll();
$hashed_password = $results[0]["hashed_password"];

if (password_verify($password, $hashed_password)) {
	$_SESSION["logged_in"] = true;
	$_SESSION["current_user"] = $results[0]["user_name"];
	header("Location: welcome.php");
	exit;
} else {
	$_SESSION["loggin_in"] = false;
	header("Location: signin.php")
	exit;
}

?>