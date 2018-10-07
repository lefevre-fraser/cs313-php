<?php

session_start();

if (isset($_POST["add"])) {
	array_push($_SESSION["cart"], $_POST["add"]);
}

if (isset($_POST["rem"])) {
	unset($_SESSION["cart"][$_POST["rem"]]);
}

?>