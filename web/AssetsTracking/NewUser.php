<?php
include_once("DatabaseConnect.php");

$queryString  = "select salt_id, salt_value from salts";

$query = $db->prepare($queryString);
$query->execute();
$queryResult = $query->fetch_all();

print_r($queryResult);
?>