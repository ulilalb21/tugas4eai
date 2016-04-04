<?php
	require_once('lib/nusoap.php');
	$client = new nusoap_client('http://www.webservicex.net/globalweather.asmx');

	//Memanggil method
	$response = $client->call('get_message', array("name"=>"Jack"));
	echo $response;

	echo "<br/>";
	$response2 = $client->call('get_diagnose', array('category'=>'basic', 'name'=>'Jack'));
	echo $response2;

	$data = array(
		'ID' => '1',
		'first_name' => "Jack",
		'last_name' => 'Sparrow',
		'birthdate' => '1994-03-23'
	);
	$response = $client->call('reformat_data', array("medicalpatient"=>$data));
	echo "<pre>";
	print_r($response);
	echo "</pre>";

?>