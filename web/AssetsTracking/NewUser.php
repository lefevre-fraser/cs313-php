<?php
include_once("DatabaseConnect.php");

$queryString  = "select salt_id, salt_value from salts";

$queryResult = $db->query($queryString);

echo $queryResult[0]["salt_id"];
echo $queryResult[0]["salt_value"];
?>