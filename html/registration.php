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
$ID 	 	= GET("ID_create",$flag);
$pass 	 	= GET("pass_create",$flag);
$firstName 	= GET("firstName_create",$flag);
$lastName 	= GET("lastName_create",$flag);
$email 	 	= GET("email_create",$flag);

//Creating array to send it thru rabbitMQ
$request = array();
$request['type'] = "Register";
$request['ID'] = $ID;
$request['pass'] = $pass;
$request['firstName'] = $firstName;
$request['lastName'] = $lastName;
$request['email'] = $email;


//Sending it thru rabbitMQ and getting response saved in 'response' variable
$response = $client->send_request($request);

//$response = $client->publish($request);

//Echo the response to the end user
if($response = true)
{
	echo "Registration processed. Try logging in to the system!";
}
else
{
	echo "Registration failed. Please contact the help desk!";
}

?>

	</body>
</html>