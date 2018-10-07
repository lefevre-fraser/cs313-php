<?php 
session_start();
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="prove03.css">
    
    <script src="prove03.js"></script> 
    <script src="../shared/shared.js"></script> 
</head>
<body>

	<div id="main_div" class="container">

		<?php
		include 'header.php';
		?>

		<div class="col-1 container-fluid">
		
		</div>
		<div class="col-8 list-group-item container-fluid">
			<?php
			include 'dictionary.php';
			?>

			<h3>Your Cart:</h3>
			<div class="row">
				<?php
				foreach ($_SESSION["cart"] as $key => $value) {
					$product = $products[$value];
					print(
						"
						<div class='col-4'>
							<div class='padding-5'>
								<div class='row'>
<pre class='wrap'>
$product->name
$$product->price
</pre>
								</div>
								<div class='row wrap'>
									<img class='img-fluid' src='pictures/$product->pictureName'>
								</div>
								<br>
							</div>
						</div>
						"
					);
				}
				?>
			</div>
		</div>
		<div class="col-1 container-fluid">
			
		</div>

		<br>
		<br>

		<div class="row">
			<div class="col-1 container-fluid">
				
			</div>
			<div class="col-8 container-fluid">

				<?php
				$sum = 0.00;
				foreach ($_SESSION["cart"] as $key => $value) {
					$product = $products[$value];
					$sum += $product->price;
				}

				print("<h4>Total Price: $$sum</h4>")
				?>

				<form action="confirmation.php" method="post">
					<label>Address Line 1:</label><br>
					<input type="text" name="address1" placeholder="1559 Something St." required><br>
					<label>Address Line 2:</label><br>
					<input type="text" name="address2" placeholder="Apt 2150" required><br>
					<label>City:</label><br>
					<input type="text" name="city" placeholder="Las Vegas" required><br>
					<label>State:</label><br>
					<input type="text" name="state" placeholder="Nevada" required><br>
					<label>Zip Code:</label><br>
					<input type="text" name="zip" placeholder="89149" required><br><br>

					<button type="submit" class="btn btn-lg btn-secondary">Confirm Purchase</button>
					<button onclick="window.history.back();" type="button" class="btn btn-lg btn-secondary">Cancel Purchase</button>
				</form>
			</div>
			<div class="col-1 container-fluid">
				
			</div>
		</div>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>