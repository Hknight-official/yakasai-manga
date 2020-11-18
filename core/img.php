<?php
include("../system/init.php");
if (!check_data_method($get_, ["key", "id"])){
    http_response_code(404);
    exit();
}

$query = $conn->query("SELECT * FROM `images_server` WHERE `id` = '{$get_['id']}'");
if (!$query->num_rows > 0){
    http_response_code(404);
    exit();
}
$row = $query->fetch_assoc();
if (hash("sha256", $row['key_img'].$key_general_img) != $get_['key']){
    http_response_code(404);
    exit();
}
if ($row['type'] == 0){
    $path = file_get_contents('ftp://'.$username_ftp.':'.$password_ftp.'@'.$host_ftp.$row['path_ftp']);
} else {
    $path = file_get_contents($row['url_img']);
}
header('Content-type: ' . image_file_type_from_binary($path));
exit($path);