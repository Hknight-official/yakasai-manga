<?php 
header('content-type: application/json');
include("../../system/init.php");

$fb = new Facebook\Facebook([
    'app_id' => $key_fb_app, // Replace {app-id} with your app id
    'app_secret' => $key_fb_secret,
    'default_graph_version' => 'v2.2',
    ]);
  
  $helper = $fb->getRedirectLoginHelper();
  
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl($urlweb.'/core/auth/fb-callback.php', $permissions);
  header("location: ".$loginUrl);
  exit();