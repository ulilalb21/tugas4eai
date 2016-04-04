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

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >Tugas 4 EAI</a>
            </li>
            <li>
                <a href="#top" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="#about" onclick = $("#menu-close").click(); >Cities</a>
            </li>
            <li>
                <a href="#services" onclick = $("#menu-close").click(); >Weather</a>
            </li>
            <li>
                <a href="#portfolio" onclick = $("#menu-close").click(); >Temperature Converter</a>
            </li>
            <li>
                <a href="#contact" onclick = $("#menu-close").click(); >Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-top">
            <h1>Tugas 4 EAI</h1>
            <h3>Kelompok 02</h3>
            <br>
            <a href="cities.php" class="btn btn-dark btn-lg">View Cities</a>
            <a href="#" class="btn btn-dark btn-lg">Weather</a>
            <a href="#" class="btn btn-dark btn-lg">Temperature Converter</a>
        </div>
        <div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Country Name: <input type="text" name="CountryName">
                <input type="submit" name="submit" value="Submit">
            </form>


            <?php

                if (!isset($_SERVER['PHP_AUTH_USER']))
                {
                    header('WWW-Authenticate: Basic realm="My Realm"');
                    header('HTTP/1.0 401 Unauthorized');
                    echo 'Text to send if user hits Cancel button';
                    exit;
                }
                else
                {
                    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
                    echo "<p>You have entered your password.</p>";
                }
                
                $proxyhost = "152.118.24.10";
                $proxyport = "8080";
                $proxyusername = $_SERVER['PHP_AUTH_USER'];
                $proxypassword = $_SERVER['PHP_AUTH_PW'];

                var_dump($_POST["CountryName"]);
                require_once('lib/nusoap.php');
                $client = new nusoap_client('http://http://www.webservicex.net/globalweather.asmx',
                        $proxyhost, $proxyport, $proxyusername, $proxypassword);

                $GetCitiesByCountry = array ('CountryName' => $_POST["CountryName"]);


                
                $response = $client->call('GetCitiesByCountry', array('GetCitiesByCountry' => $GetCitiesByCountry));
                var_dump($response);
                echo (string)$response;
                
                if ($client->fault) {
                    echo '<h2>Fault</h2><pre>';
                    print_r($result);
                    echo '</pre>';
                } else {
                    // Check for errors
                    $err = $client->getError();
                    if ($err) {
                        // Display the error
                        echo '<h2>Error</h2><pre>' . $err . '</pre>';
                    } else {
                        // Display the result
                        echo '<h2>Result</h2><pre>';
                        print_r($result);
                        echo '</pre>';
                    }
                }
            ?>
        </div>
    </header>


    <!-- Footer -->
<!--     <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Muhammad Ulil Albab (1206246585) | Nitto Sahadi (1501234567)</strong>
                    </h4>
                    <p>Fakultas Ilmu Komputer<br>Universitas Indonesia</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">muhammad.ulil21@ui.ac.id</a>
                        </li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">nitto.sahadi@ui.ac.id</a>
                        </li>
                    </ul>
                    <br>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Kelompok 02 EAI 2016</p>
                </div>
            </div>
        </div>
    </footer> -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>


</body>

</html>
