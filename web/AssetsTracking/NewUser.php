<?php
include_once("DatabaseConnect.php");

$queryString  = "select salt_id, salt_value from salts";

$query = $db->prepare($queryString);
$query->execute();
$queryResult = $query->fetchAll();

echo $queryResult[0]["salt_value"];
?>