<?php

$_GET["phone_number"] = "(702) 960-3038";
echo $_GET["phone_number"] . "\n";

$area_code = preg_split("/\(/", $_GET["phone_number"]);
$area_code = preg_split("/\)/", $area_code[1]);
$phone_number = preg_split("/ /", $area_code[1]);

$area_code = $area_code[0];
$phone_number = $phone_number[1];


echo $area_code . "\n";

echo $phone_number . "\n";
?>