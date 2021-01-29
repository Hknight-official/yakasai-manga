<?php 
    header('content-type: application/json');
    include("../../system/init.php");

    if (!client()){
        exit(json_encode(["title" => "Thất bại", "msg" => "Bạn cần đăng nhập để thực hiện chức năng này!", "status" => "success"]));
    }

    if(!exit_data_method($get_, ["id_comics"])){
        exit("");
    }
    $query = $conn->query("SELECT * FROM `comics_subscribe` WHERE `comic` = '{$get_['id_comics']}' `user` = ".client()['id']);
    if ($query->num_rows > 0){
        $conn->query("DELETE FROM `comics_subscribe` WHERE id = ".$query->fetch_assoc()['id']);
        exit("<script>alert('Xóa theo dõi truyện thành công!'); window.history.go(-1);</script>");
    } else {
        $id_comic = escape_input($get_['id_comics']);
        $query_check = $conn->query("SELECT * FROM `comics` WHERE id = {$id_comic}");
        if ($query_check->num_rows < 1){
            header("location: /");
            exit();
        }
        $conn->query("INSERT INTO `comic_subscribe` (`user`, `comic`) VALUES ('".client()['id']."', '{$get_['id_comics']}')");
        exit("<script>alert('Theo dõi truyện thành công!'); window.history.go(-1);</script>");
    }
   
