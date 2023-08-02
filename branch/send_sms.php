<?php
	// Account details
	$apiKey = urlencode('NjQ1NTU3NTc0ZTRhNDg0MjdhNTA3MDQ5NjE1NTMzMzI=');
	
	// Message details
	$numbers = array(447123456789, 447987654321);
	$sender = urlencode('CBRC');
	$message = rawurlencode('Sample Message');
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>