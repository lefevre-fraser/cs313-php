<?php

/*
	Error code dictionary:
		different arrays for different error types
*/
$insert_user_error = 
	array(
		0 => 'An unknown error has occured while trying to add you as a user',
		1 => 'Successfully added you as a user',
		2 => 'User name already exists');

$insert_error = 
	array(
		0 => 'An unknown error has occured while inserting your asset',
		1 => 'Asset Insertion successful',
		2 => 'You already have an asset with that name and unit value');

$change_error = 
	array(
		0 => 'An uknown error has occured while trying to change your assets',
		2 => 'You already have an asset with that name and unit value',
		3 => 'Multiple Errors occured while changing your asset information');

$login_error = 
	array(
		0 => 'Unable to login with provided credentials');

/*
	Error code display function.
*/
function insert_error_scripts()
{
	// JQuery required for script execution
	echo "<script>$('document').ready(function() {";

	// create new user errors
	if (isset($_SESSION["insert_user_error"])) {
		echo "alert(\"" . $GLOBALS["insert_user_error"][$_SESSION["insert_user_error"]] . "\");";

		unset($_SESSION["insert_user_error"]);
	}

	// insert asset erros
	if (isset($_SESSION["insert_error"])) {
		echo "alert(\"" . $GLOBALS["insert_error"][$_SESSION["insert_error"]] . "\");";

		unset($_SESSION["insert_error"]);
	}

	// chagning asset values errors
	if (isset($_SESSION["change_error"])) {

		if ($_SESSION["change_error"] != 1) {
			echo "alert(\"" . $GLOBALS["change_error"][$_SESSION["change_error"]] . "\");";
		}

		unset($_SESSION["change_error"]);
	}

	// login errors
	if (isset($_SESSION["login_error"])) {
		if ($_SESSION["login_error"] != 1) {
			echo "alert(\"" . $GLOBALS["login_error"][$_SESSION["login_error"]] . "\");";

			unset($_SESSION["login_error"]);
		}
	}

	echo "})</script>";
}
?>