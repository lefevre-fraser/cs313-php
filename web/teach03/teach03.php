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
			<input type="radio" name="major">
			<label>Computer Science</label>
			<input type="radio" name="major">
			<label>Web Design and Development</label>
			<input type="radio" name="major">\
			<label>Computer Information Technology</label>
			<input type="radio" name="major">
			<label>Computer Engineering</label>
		</div>
		<div>
			<input type="checkbox" name="continents">
			<label>North America</label>
			<input type="checkbox" name="continents[]">
			<label>South America</label>
			<input type="checkbox" name="continents[]">
			<label>Europe</label>
			<input type="checkbox" name="continents[]">
			<label>Asia</label>
			<input type="checkbox" name="continents[]">
			<label>Austrailia</label>
			<input type="checkbox" name="continents[]">
			<label>Africa</label>
			<input type="checkbox" name="continents[]">
			<label>Antartica</label>
		</div>
		<br><label>Comments</label><br>
		<textarea name="comments"></textarea>
		<br>
		<button type="submit">Submit</button>
	</form>
</body>
</html>