<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="display.php" method="post">
		<input type="text=" name="name">
		<label>Name</label><br><br>
		<input type="text=" name="email">
		<label>Email</label><br><br>
		<div>
			<?php
				include("dictionary.php");

				foreach ($majors as $key => $value) {
					print("<input type='radio' value='" . $key . "' name='major'>");
					print("<label>" . $value . "</label>");
				}
			?>
<!-- 
			<input type="radio" value="Computer Science" name="major">
			<label>Computer Science</label>
			<input type="radio" value="Web Design and Development" name="major">
			<label>Web Design and Development</label>
			<input type="radio" value="Computer Information Technology" name="major">
			<label>Computer Information Technology</label>
			<input type="radio" value="Computer Engineering" name="major">
			<label>Computer Engineering</label> -->
		</div>
		<div>

			<?php
				// include("dictionary.php");

				foreach ($continents as $key => $value) {
					print("<input type='checkbox' value='" . $key . "' name='continents[]'>");
					print("<label>" . $value . "</label>");
				}
			?>
<!-- 			<input type="checkbox" value="North America" name="continents[]">
			<label>North America</label>
			<input type="checkbox" value="South America" name="continents[]">
			<label>South America</label>
			<input type="checkbox" value="Europe" name="continents[]">
			<label>Europe</label>
			<input type="checkbox" value="Asia" name="continents[]">
			<label>Asia</label>
			<input type="checkbox" value="Austrailia" name="continents[]">
			<label>Austrailia</label>
			<input type="checkbox" value="Africa" name="continents[]">
			<label>Africa</label>
			<input type="checkbox" value="Antartica" name="continents[]">
			<label>Antartica</label> -->
		</div>
		<br><label>Comments</label><br>
		<textarea name="comments"></textarea>
		<br>
		<button type="submit">Submit</button>
	</form>
</body>
</html>