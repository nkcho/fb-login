<?php

// start a session
session_start();

// autoload file from  fb SDK
require './vendor/autoload.php';

// keys for the app
$fb = new Facebook\Facebook([
	'app_id' => '',
	'app_secret' => '',
]);

// get login redirect helper
$helper = $fb->getRedirectLoginHelper();

// get login url
$login_url = $helper->getLoginUrl('http://localhost/projects/facebook/fb-login/');
 
// handling session access with tokens
try{
	$access_token = $helper->getAccessToken();
	if(isset($access_token)){
		$_SESSION['access_token'] = (string)$access_token;
		
		//redirect to dashboard on success
		header('Location: index.php');
	}
	// catch and handle errors
}catch(Exception $e){
	echo $e->getTraceAsString();
}

// access client data if session was initialised
if(isset($_SESSION['access_token'])){
	
	try{
		$fb->setDefaultAccessToken($_SESSION['access_token']);
		$res = $fb->get('/me?locale=en_US&fields=name,email');
		$user = $res->getGraphUser();

		// put client data in an array
		$user_data = array(
				'username'=>$user->getField('name'),
				'client_id'=>$user->getField('id')
		);

		// encoding client data
		$json_data = json_encode( $user_data );
		
	//catch and handle errors
	}catch(Exception $e){ 
		echo $e->getTraceAsString();
	}
	
}


