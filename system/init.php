<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$conn = new mysqli("103.200.22.100", "yakasain_manga", "v)}_JCQ)^Is5", "yakasain_manga");
$conn->set_charset("utf8");
$nameweb = "Yakasai.net";
$per_page = 18;
$hot_view = 500;

foreach (glob(__DIR__."/function/*.php") as $filename)
{
    include($filename);
}

include(__DIR__."/../vendor/autoload.php");

if (isset($_GET)){
    foreach ($_GET as $key_get => $value_get){
        $get_[mb_strtolower($key_get)] = $conn->escape_string($value_get);
    }
}
if (isset($_POST)){
    foreach ($_POST as $key_post => $value_post){
        $post_[mb_strtolower($key_post)] = $conn->escape_string($value_post);
    }
}
    