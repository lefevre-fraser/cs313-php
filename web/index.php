<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Personal Homepage</title>
        <link type="text/css" rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="index.js"></script>
    </head>
    
    <body>
    	<div id="main_div" class="container-fluid border-primary border-light border rounded">

	    	<?php  
	    		include("header.php");
	    	?>

	    	<div class="container-fluid">
	    		<div class="container-fluid">
	    			<h3 class="h3">A note&#9835; about myself:</h3>
	    			<div class="container-fluid row">
		    			<p id="intro" class="p-lg-3 col-6">
		    				My name is Fraser LeFevre.<br/>
		    				<span class="indent-sm">I was born in Las Vegas, Nevada, served a mission in Legazpi, Philippines, and then while going to school in Rexburg, Idaho, I met my wife, and married her in the Las Vegas, Nevada Temple. My wife and I are now continuing our education as on-campus BYU-Idaho students.</span><br/>
		    				<span class="indent-sm">I have many hobbies, my favorite of which are:</span><br/>
		    				<span class="indent-md"> * Horse Ridding</span><br/>
		    				<span class="indent-md"> * Snow Boarding</span><br/>
		    				<span class="indent-md"> * Playing Sports - not watching</span>
		    			</p>
		    			<div class="col-6 align-content-center">
	    					<img src="pictures/MyWifeAndI.jpg" alt="My Wife And I" class="img-fluid">
	    				</div>
	    			</div>
	    		</div>
	    	</div>

	    </div>

	    <script>
	    	setActive('index');
	    </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>