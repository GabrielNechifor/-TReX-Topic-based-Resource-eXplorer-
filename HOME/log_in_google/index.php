<?php
include_once 'gpConfig.php';
include_once 'User.php';
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
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	//$_SESSION['userData'] = $userData;
	
	//Render google profile data
    if(!empty($userData)){
        $output = '<h1 align="center"><b>Sunteti logat deja </b></h1>';
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt="" /></a>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Log_in</title>
        <link href="style.css" rel="stylesheet" />
    </head>
    <body>
        <header><img class="logo" src="images/lo.png" alt=""></header>
    <article>
       <section class="div_form">
       <div ><?php echo $output; ?></div>
       </section>
    </article>
    <footer> Copyright &copy; Faculty of Computer Science, group A7</footer>
    </body>
</html>