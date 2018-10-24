<?php

$LoginPage = '<div id="main_div" class="container h-100 d-flex justify-content-center">';

$LoginPage .=
	'<div class="jumbotron my-auto">
	<form action="login.php" method="post">
		<label>User Name:</label><br>
		<input type="text=" size="40" name="user_name"><br>
		<label>Password:</label><br>
		<input type="password" size="40" name="password"><br><br>
		<button type="submit" class="btn btn-block">Login</button><br>
		<a href="NewUser.php">Don\'t have an account? SignUp Here</a>
	</form>	
	</div>';

$LoginPage .= "</div>";

?>