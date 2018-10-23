<?php
include_once("DatabaseConnect.php");

$queryString  = "select salt_id, salt_value from salts";

$queryResult = $db->query($queryString);

echo sizeof($queryResult);
echo $queryResult->"0";
?>