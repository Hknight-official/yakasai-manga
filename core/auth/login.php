<?php 
    header('content-type: application/json');
    include("../../system/init.php");
    use root\entities\user\User;
    #[!] array code msg
    $array_code_msg = [
        200 => "Đăng nhập thành công!",
        400 => "Thiếu thông tin đăng nhập",
        403 => "Sai mật khẩu!",
        404 => "Tài khoản không tồn tại"
    ];
    if (empty($post_['username']) || empty($post_['password']) || empty($post_['csrf'])){
        exit(json_encode(["status" => 400, "msg" => $array_code_msg[400] ]));
    }

    if ($_SESSION['csrf_key'] != $post_['csrf']){
		exit("http error: require csrf !");
	}

    $login_core = User::login($post_['username'], $post_['password']);
    $code = $login_core['code'];
    if ($login_core['status']){
        $_SESSION['user'] = $login_core['data'];
        // TODO: add session manager
    }
    exit(json_encode(["status" => $code, "msg" => $array_code_msg[$code]]));
