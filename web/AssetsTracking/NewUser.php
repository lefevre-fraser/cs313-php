<?php
include_once("DatabaseConnect.php");

$queryString  = "select salt_id, salt_value from salts";

$queryResult = $db->prepare($queryString);
$queryResult->execute();
$queryResult = $queryResult->fetch_all();

print_r($queryResult);
?>