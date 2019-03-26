<!DOCTYPE>
<html>
	<head>
		<title>Welcome to Team Null's Stock Simulation!</title>
		
		<meta charset="UTF-8">
		
		<style>
		</style>
		
	</head>

	<body>
	<h2>Welcome to the Stock Simulator!</h2>

<?php
//Getting functions
include ("functions.php");

//Getting the rabbitMQ data
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//Creating the rabbitMQ client
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

//Getting data from FrontPage.html
$ID 	 = GET("ID_input",$flag);
$pass 	 = GET("pass_input",$flag);

//Creating array to send it thru rabbitMQ
$request = array();
$request['type'] = "Login";
$request['ID'] = $ID;
$request['pass'] = $pass;

//Sending it thru rabbitMQ and getting response saved in 'response' variable
$response = $client->send_request($request);

//$response = $client->publish($request);

//Echo the response to the end user
if($response==true)
{
	echo "Authentication completed, welcome $ID !";
}
else
{
	echo "Authentication failed, try again !";
}

?>

	</body>
</html>