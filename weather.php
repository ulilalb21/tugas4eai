<?php
/*
 *	$Id: wsdlclient1.php,v 1.3 2007/11/06 14:48:48 snichol Exp $
 *
 *	WSDL client sample.
 *
 *	Service: WSDL
 *	Payload: document/literal
 *	Transport: http
 *	Authentication: none
 */

require_once('lib/nusoap.php');
if(!isset($_SERVER['PHP_AUTH_USER'])){
		header('WWW-Authenticate: Basic realm="My Realm"');
		header('HTTP/1.0 401 Unauthorized');
		echo "Text to send if user hits Cancel button";
		exit;
	}else{
		echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
		echo "<p>You have entered your password.</p>";
	}

	$username = $_SERVER['PHP_AUTH_USER'];
	$password = $_SERVER['PHP_AUTH_PW'];

	if (version_compare(PHP_VERSION, '5.4') < 0) {
	echo "old_version";
    $str_auth_header = $username.$password;
    ini_set('user_agent', 'PHP-SOAP/' . PHP_VERSION . "\r\n" . $str_auth_header);
} 

$client = new nusoap_client('http://www.webservicex.net/globalweather.asmx');



$err = $client->getError();
if ($err) {
	echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}
// Doc/lit parameters get wrapped
$param = array('CityName' => 'Jakarta', 'CountryName', 'Indonesia');
$result = $client->call('GetWeather', array("parameters"=>$param), '', '', false, true);
// Check for a fault
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
echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
/*$err = $client->getError();
if ($err) {
	echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}
$param = array('CityName' => 'Jakarta', 'CountryName' => 'Indonesia');
$result = $client->call('GetWeather', array('parameters' => $param), '', '', false, true);
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
echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';*/
?>