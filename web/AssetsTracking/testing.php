<?php
session_start();

include_once("BootStrapHeader.php");
echo $BootStrapHeader;

$_SESSION["insert_user_error"] = 2;
$_SESSION["insert_error"] = 2;
$_SESSION["change_error"] = 3;

echo "stuff";

include_once("ErrorDictionary.php");

insert_error_scripts();

include_once("BootStrapFooter.php");
echo $BootStrapFooter;

?>
