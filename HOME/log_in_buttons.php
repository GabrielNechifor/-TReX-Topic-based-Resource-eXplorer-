<?php
include_once 'log_in_google/gpConfig.php';
include_once 'log_in_google/User.php';
$session_id=session_id();
if(isset($_GET['code'])){

	$gClient->authenticate($_GET['code']);
	$_SESSION[$session_id] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION[$session_id])) {
    $gClient->setAccessToken($_SESSION[$session_id]);   
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new User();
	if(!isset($gpUserProfile['gender'])) $gpUserProfile['gender']=" ";
	if(!isset($gpUserProfile['link'])) $gpUserProfile['link']=" ";

	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'] ,
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	//$_SESSION['userData'] = $userData;
	
	//Render google profile data
    if(!empty($userData)){
				$output = '<a href="log_in_google/logout.php"><button class="buttons">Log out</button></a>';
				$output .='<a href="Profile.php"><button class="buttons"><i class="far fa-id-card"></i>'.$userData['first_name'].'</button></a>';
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<a href="log_in_google/"><button class="buttons">Log in</button></a>';
}
?>