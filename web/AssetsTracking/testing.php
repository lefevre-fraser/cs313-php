<?php
session_start();

$_SESSION["insert_user_error"] = 2;
$_SESSION["insert_error"] = 2;
$_SESSION["change_error"] = 3;

include_once("ErrorDictionary.php");

insert_error_scripts();

?>
