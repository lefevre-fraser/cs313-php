<?php
include_once("DatabaseConnect.php");

$queryString  = "select salt_id, salt_value from salts";

$queryResult = $dq->query($queryString);

foreach ($queryResult as $row) {
	echo gettype($row);
}
?>