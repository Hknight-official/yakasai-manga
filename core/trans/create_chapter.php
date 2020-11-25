<?php 
    header('content-type: application/json');
    include("../../system/init.php");


    if(!exit_data_method($post_, ["id_comics", "name", "images", "chapter"])){
        exit("");
    }
    if (!client()){
        exit(json_encode(array(
            "status" => 0,
            "msg" => "Bạn chưa đăng nhập !"
        )));
    }
    if (client()['translater'] == 0){
        exit(json_encode(array(
            "status" => 0,
            "msg" => "Bạn không có quyền !"
        )));
    }
    $query_ = $conn->query("SELECT * FROM `comics` WHERE `user` = ".client()['id']." AND `id` = {$post_['id_comics']}");
    if (!$query_->num_rows > 0){
        exit(json_encode(array(
            "status" => 0,
            "msg" => "Có lỗi xảy ra nè !"
        )));
    }
    $array_image = explode("|", $post_['images']);
    if (!count($array_image) > 0){
        exit(json_encode(array(
            "status" => 0,
            "msg" => "Ảnh truyện nhập không đúng!"
        )));
    }
    $chapter = (int) $post_['chapter'];
    $image_chapter = [];
    foreach ($array_image as $value_){
        if(!empty($value_)){
            $img_server = trim(preg_replace('/\s\s+/', ' ',"/".client()['id'].$value_));
            $conn->query("INSERT INTO `images_server`(`path_ftp`, `url_img`, `key_img`, `user`) VALUES ('{$img_server}', NULL, '".time()."', '".client()['id']."')");
            $image_chapter[] = $conn->insert_id;
        }
    }
    $done_img = json_encode($image_chapter);
    $conn->query("INSERT INTO `comics_chapters`(`comic`, `images`, `chapter`, `chapter_name`) VALUES ('{$post_['id_comics']}', '{$done_img}', '{$chapter}', '{$post_['name']}')");
    $chapter_last = $conn->query("SELECT max(chapter) as `result` FROM `comics_chapters` WHERE `comic` = '{$post_['id_comics']}'")->fetch_assoc()['result'];
    $conn->query("UPDATE `comics` SET `last_chapter` = {$chapter_last} WHERE `id` = {$post_['id_comics']}");
    $name_comic = $conn->query("SELECT * FROM `comics` WHERE id = {$post_['id_comics']}")->fetch_assoc();
    exit(json_encode(array(
        "status" => 1,
        "msg" => "Up Truyện Thành Công!",
        "url" => "/".strtolower(explode(", ", $name_comic['genres'])[0])."/".str_replace(" ", "-", $name_comic['name'])."/".$post_['id_comics']
    )));