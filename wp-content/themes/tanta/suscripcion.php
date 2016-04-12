<?php
	
$apiKey = "22811eb2f831ab360f281d755391d670";
$pass = "";	
$listId = "dfa797e16e51b51595bde23f9ade3890";	
$url = 'http://api.createsend.com/api/v3/subscribers/'.$listId.'.json';
$json = '{"EmailAddress": "'.$_POST['inp_newsletter'].'", "Name": "Nuevo suscriptor desde el blog",  "Resubscribe": true}';

$session = curl_init($url);

curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($session, CURLOPT_USERPWD, "$apiKey:$pass");
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $json);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($session);
curl_close($session); 

echo $response;
	
?>
