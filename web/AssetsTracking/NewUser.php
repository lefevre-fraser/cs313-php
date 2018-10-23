<?php
include_once("DatabaseConnect.php");

$queryString  = "select user_name from users";
$queryString .= " where user_name = 'LeFeve'";

$query       = $db->prepare($queryString);
$query->execute();
$queryResult = $query->fetchAll();

echo sizeof($queryResult);
?>