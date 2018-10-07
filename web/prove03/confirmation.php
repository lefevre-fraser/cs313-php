<?php 
session_start();
$_SESSION['purchase'] = $_SESSION['cart'];
unset($_SESSION['cart']);
$_SESSION['cart'] = array();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>

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
			<h2>Purchase Successful!</h2>
			<h3>Your Purchase:</h3>
			<div class="row">
				<?php
				foreach ($_SESSION["purchase"] as $key => $value) {
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
				foreach ($_SESSION["purchase"] as $key => $value) {
					$product = $products[$value];
					$sum += $product->price;
				}

				print("<h4>Total Price: $$sum</h4>")
				?>


				<h4>Items will be sent to:</h4>
				<?php
				$address1 	= htmlspecialchars($_POST['address1']);
				$address2 	= htmlspecialchars($_POST['address2']);
				$city		= htmlspecialchars($_POST['city']);
				$state		= htmlspecialchars($_POST['state']);
				$zip		= htmlspecialchars($_POST['zip']);
				print(
					"
<pre>
$address1, $address2
$city, $state, $zip
</pre>
					"
				);
				?>
			</div>
			<div class="col-1 container-fluid">
				
			</div>
		</div>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>