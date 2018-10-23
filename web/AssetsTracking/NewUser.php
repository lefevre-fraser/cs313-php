<?php
include_once("DatabaseConnect.php");

$queryString  = "select salt_id, salt_value from salts";

$queryResult = $db->query($queryString);

$salt = $queryResult[0];
echo $salt["salt_id"];
echo $salt["salt_value"];
?>