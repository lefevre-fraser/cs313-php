<?php
include_once("DatabaseConnect.php");

$queryString  = "select salt_id, salt_value from salts";
$query = $db->prepare($queryString);
$query->execute();
$queryResult = $query->fetchAll();
$i = mt_rand(0, sizeof($queryResult));
echo $queryResult[$i]["salt_id"];
echo $queryResult[$i]["salt_value"];
?>