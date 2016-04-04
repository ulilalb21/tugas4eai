<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tugas 4 EAI Kelompok 02</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<?php include 'nav.php' ?>

    <!-- Header -->
    <header id="top" class="header">
    	<div class="text-vertical-center">
    		<h1>Temperature Converter</h1>
    		<h4>Convert temperature from Celsius to Fahrenheit and Reaumur</h4>
    		<div class="col-sm-12">
    			<form class="form-inline" method="post" enctype="multipart/form-data" action="" id='converttemp'>
				  <div class="input-group form-group">
				    <input type="number" class="form-control" id="temperature" placeholder="Temperature" name="temperature">
				    <span class="input-group-addon" id="basic-addon2">&deg;C</span>
				  </div>
				  <div class='form-group'><button type="submit" class="btn btn-primary">Convert!</button></div>
				</form>
		    	<?php
		    		if($_POST){

		    			require_once('lib/nusoap.php');

						$client = new nusoap_client('http://www.webservicex.net/ConvertTemperature.asmx?wsdl', true);

						$err = $client->getError();
						if ($err) {
							echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
						}
						// Doc/lit parameters get wrapped
						$param = array('Temperature' => $_POST['temperature'], 'FromUnit' => 'degreeCelsius', 'ToUnit' => 'degreeFahrenheit');
						$param2 = array('Temperature' => $_POST['temperature'], 'FromUnit' => 'degreeCelsius', 'ToUnit' => 'degreeReaumur');
						$result = $client->call('ConvertTemp', array('parameters' => $param));
						$result2 = $client->call('ConvertTemp', array('parameters' => $param2));

						// Check for a fault
						if ($client->fault) {
							echo '<h2>Fault</h2>';
							print_r($result['faultstring']);
						} else {
							// Check for errors
							$err = $client->getError();
							if ($err) {
								// Display the error
								echo '<h2>Error</h2><pre>' . $err . '</pre>';
							} else {
								echo "<h2>";
								echo $_POST['temperature']."&deg;C = ".$result['ConvertTempResult']."&deg;F = ".$result2['ConvertTempResult']."&deg;R";
								echo "</h2>";
							}
						}
		    		}
		    	?>
	    	</div>
        </div>
    </header>

    <?php include 'footer.php' ?>

</body>

</html>