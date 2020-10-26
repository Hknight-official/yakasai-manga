<?php 
    header('content-type: application/json');
    include("../../system/init.php");

    if ($_SESSION['csrf_key'] != $post_['csrf']){
		exit("cut me may di!");
    }
    
    if (empty($post_['username']) || empty($post_['email']) || empty($post_['password']) || empty($post_['repassword'])) {
        exit(json_encode(array(
            "status" => 0,
            "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin !"
        )));
    }

    $username = $post_['username'];
    $email = $post_['password'];
    $password = $post_['password'];
    $repassword = $post_['repassword'];

    $accounts = $conn->query("SELECT * FROM `users` WHERE `name` = '{$username}' OR `email` = '{$username}'");

    if ($accounts->num_rows > 0) {
        exit(json_encode(array(
            "status" => 0,
            "msg" => "Tài Khoản Đã Tồn Tại !"
        )));
    }

    if ($password !== repassword) {
        exit(json_encode(array(
            "status" => 0,
            "msg" => "Mật Khẩu Nhập Lại Không Khớp !"
        )));
    }

    $_SESSION['login'] = $username;
    exit(json_encode(array(
        "status" => 200,
        "msg" => "Đăng Nhập Thành Công !"
    )));