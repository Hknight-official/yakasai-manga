<?php 
    header('content-type: application/json');
    include("../../system/init.php");

    if ($_SESSION['csrf_key'] != $post_['csrf']){
		exit("cut me may di!");
    }
    
    if (empty($post_['username']) || empty($post_['password'])) {
        exit(json_encode(array(
            "status" => 0,
            "msg" => "Vui Lòng Nhập Tài Khoản Hoặc Mật Khẩu !"
        )));
    }

    $username = $post_['username'];
    $password = $post_['password'];

    $accounts = $conn->query("SELECT * FROM `users` WHERE `name` = '{$username}' OR `email` = '{$username}'");

    if (!$accounts->num_rows > 0) {
        exit(json_encode(array(
            "status" => 0,
            "msg" => "Tài Khoản Không Tồn Tại !"
        )));
    }

    $accounts = $accounts->fetch_array();

    if ($password !== $accounts['password']) {
        exit(json_encode(array(
            "status" => 0,
            "msg" => "Sai Mật Khẩu !"
        )));
    }

    $_SESSION['login'] = $accounts['id'];
    exit(json_encode(array(
        "status" => 200,
        "msg" => "Đăng Nhập Thành Công !"
    )));