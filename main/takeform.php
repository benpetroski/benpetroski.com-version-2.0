<?php
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$subject = 'Message from ' . $name . ' through BenPetroski.com';

$url = 'https://api.sendgrid.com/';
$user = 'benpetroski';
$pass = 'passforsendgrid';

$params = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'to'        => 'ben@benpetroski.com',
    'subject'   => $subject,
    'html'      => $message,
    'text'      => $message,
    'from'      => $email,
  );


$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

$findme = 'success';
$pos = strpos($response, $findme);

if ($pos === false) {
	$resp = 'Failed to send. Please try again.';
    print_r($resp);
} else {
    $resp = 'Sent. I will get back to you soon!';
    print_r($resp);    
}

?>