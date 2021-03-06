<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Assignments Page</title>
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
                    <h3 class="h3">My CS 313 Assignments Page</h3>
                    <ul>
                        <li><a href="hello.html">Hello World</a></li>
                        <li><a href="teach02/teach02.html">Teach 02</a></li>
                        <li><a href="teach03/teach03.php">Teach 03</a></li>
                        <li><a href="teach05/searchbybook.php">Teach 05</a></li>
                        <li><a href="teach06/Scriptures.php">Teach 06</a></li>
                        <li><a href="prove03/products.php">Prove 03</a></li>
                        <li><a href="AssetsTracking/AssetTracker.php">Asset Tracker: Final Project</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <script>
            setActive('assignment');
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>