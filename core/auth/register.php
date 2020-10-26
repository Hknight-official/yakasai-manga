<?php
    include_once "../../system/init.php";

    use root\entities\user\User;
    header('content-type: application/json');
    $array_code_msg = [
        200 => "Đăng ký thành công!",
        400 => "Tài khoản đã tồn tại",
        403 => "Sai mật khẩu!"
    ];
    if (empty($post_['username']) || empty($post_['email']) || empty($post_['password']) || empty($post_['csrf'])) {
        exit(json_encode(['status_code' => 400, 'msg'=>'Thiếu thông tin đăng ký']));
    }

    if ($_SESSION['csrf_key'] != $post_['csrf']){
		exit("http error: require csrf !");
	}

    $register_core = User::register($post_['username'], $post_['email'], $post_['password']);
    $code = $register_core['code'];
    if ($register_core['status']) {
        $_SESSION['user'] = $register_core['data'];
    }
    exit(json_encode(['status_code'=>$code, 'msg' => $array_code_msg[$code]]));

