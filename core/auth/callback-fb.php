<?php
header('content-type: application/json');
include("../../system/init.php");

$fb = new Facebook\Facebook([
    'app_id' => $key_fb_app, // Replace {app-id} with your app id
    'app_secret' => $key_fb_secret,
    'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    //echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    //echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (!isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        //echo "Error: " . $helper->getError() . "\n";
        //echo "Error Code: " . $helper->getErrorCode() . "\n";
        //echo "Error Reason: " . $helper->getErrorReason() . "\n";
        //echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
        header('HTTP/1.0 400 Bad Request');
        //echo 'Bad request';
    }
    exit;
}

// Logged in
//echo '<h3>Access Token</h3>';
//var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
//echo '<h3>Metadata</h3>';
//var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId($key_fb_app); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (!$accessToken->isLongLived()) {
    // Exchanges a short-lived access token for a long-lived one
    try {
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        //echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
        exit;
    }

    //echo '<h3>Long-lived</h3>';
    //var_dump($accessToken->getValue());
}
$response = $fb->get('/me?fields=id,name,email', $accessToken);
$me = $response->getGraphUser();
$fid = $me->getId();
$query = $conn->query("SELECT * FROM `users` WHERE `fid` = '{$fid}'");
if ($query->num_rows > 0){
    $_SESSION['login'] = $query->fetch_assoc()['id'];
    $token = (string)$accessToken;
    $avatar = avatar($fid, $token);
    $conn->query("UPDATE `users` SET `token` = '{$token}', `profile_image` = '{$avatar}'");
} else {
    $username = $conn->escape_string(htmlspecialchars($me->getName(), ENT_QUOTES, 'UTF-8'));
    $email = $me->getEmail();
    $token = (string)$accessToken;
    $avatar = avatar($fid, $token);
    $conn->query("INSERT INTO `users` (`name`,`email`,`password`,`fid`,`token`,`profile_image`) VALUES ('{$username}','{$email}','','{$fid}','{$token}', '{$avatar}')");
    $_SESSION['login'] = $conn->insert_id;
}
header("location: /");
exit();

