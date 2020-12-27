<?php 
    header('content-type: application/json');
    include("../../system/init.php");

    if (!client()){
        exit(json_encode(["title" => "Thất bại", "msg" => "Bạn cần đăng nhập để thực hiện chức năng này!", "status" => "success"]));
    }

    