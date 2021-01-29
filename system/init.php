<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$conn = new mysqli("103.200.22.100", "yakasain_manga", "v)}_JCQ)^Is5", "yakasain_manga");
$conn->set_charset("utf8");
$nameweb = "Yakasai.net";
$urlweb = "http://localhost";
$email = "support@yakasai.net";
$per_page = 18;
$hot_view = 500;

#fb config
$key_fb_app = "725086671770547";
$key_fb_secret = "6daa4d0162df04de51d07d7b1c97d649";
#ftp img config
$host_ftp = "yakasai.net";
$username_ftp = "hknight@yakasai.net";
$password_ftp = "jDrDLWRHYlR~";
$key_secret = "hknight";
$key_general_img = $key_secret.strtotime(date("Y-m-d"));

foreach (glob(__DIR__."/function/*.php") as $filename)
{
    include($filename);
}

include(__DIR__."/../vendor/autoload.php");

$_DISABLE_KEY = 0;
    if (isset($_GET)){
        foreach ($_GET as $key_get => $value_get){
            $_DISABLE_KEY = 0;
            if (isset($_DISABLE_AUTO_CHECK_METHOD)){
                foreach ($_DISABLE_AUTO_CHECK_METHOD as $value_method_auto){
                    if ($key_get == $value_method_auto){
                        $_DISABLE_KEY = 1;
                    }
                }    
            }
            if ($_DISABLE_KEY == 1){
                continue;
            }
            $get_[mb_strtolower($key_get)] = $conn->escape_string($value_get);
        }
    }

    if (isset($_POST)){
        foreach ($_POST as $key_post => $value_post){
            $_DISABLE_KEY = 0;
            if (isset($_DISABLE_AUTO_CHECK_METHOD)){
                foreach ($_DISABLE_AUTO_CHECK_METHOD as $value_method_auto){
                    if ($key_post == $value_method_auto){
                        $_DISABLE_KEY = 1;
                    }
                }    
            }
            if ($_DISABLE_KEY == 1){
                continue;
            }
            $post_[mb_strtolower($key_post)] = $conn->escape_string($value_post);
        }
    }


    