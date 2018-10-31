<?php
include_once("DatabaseConnect.php");

$user_name = $_POST["user_name"];
$password  = $_POST["password"];

$options = array('cost' => 8);
$hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

$queryString  = " insert into users_1";
$queryString .= " ( user_name, hashed_password)";
$queryString .= " values";
$queryString .= " ( :username";
$queryString .= " , :hashedpassword)";

$query = $db->prepare($queryString);
$query->bindValue(':username', $user_name, PDO::PARAM_STR);
$query->bindValue(':hashedpassword', $hashed_password, PDO::PARAM_STR);
$query->execute();

$results = $query->fetchAll();

header("Location: login.php");
exit;

?>