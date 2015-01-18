<?php
$payload = file_get_contents('../payload.json');

$request_url 	= "https://processjson.herokuapp.com/api/v1/items"; 						// api url
$auth_url 		= "https://processjson.herokuapp.com/login";								// login url

// data for auth
$auth_data 	= array(
	"username" 	=> "deepak@deepakverma.com.au",
	"password"	=> "pass123"
);

function curl_api( $url, $data ){

	$ch 		= curl_init();
	$port 		= "5000";
	$headers 	= array(
	    			'Accept: application/json',
	    			'Content-Type: application/json'
				);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  
	curl_setopt($ch, CURLOPT_URL, $url);
	//curl_setopt($ch, CURLOPT_PORT, $port);
	  
	$result 	= curl_exec($ch);  
	$ch_error 	= curl_error($ch);
	   
	if ($ch_error) {  

	    $return_result =  "cURL Error: $ch_error";

	} else {
	  
	    $return_result = $result;
	  
	}
	 
	curl_close($ch);	

	return $return_result;
} 

$data 	= curl_api($auth_url, $auth_data );
$json 	= json_decode($data, true);

// data for json
$request_data 	= array(
	"access_token" 	=> $json["token"],
	"x_key"			=> "allschooltocinema0987654321",
	"json_data"		=> $payload
);

$response = curl_api($request_url, $request_data );

var_dump($response);

?>

