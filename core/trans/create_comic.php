<?php 
    header('content-type: application/json');
    $_DISABLE_AUTO_CHECK_METHOD = ["genres_id"];
    include("../../system/init.php");

    $data = $_POST['cover_image'];
    if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
        $data = substr($data, strpos($data, ',') + 1);
        $type = strtolower($type[1]); // jpg, png, gif
    
        if (!in_array($type, [ 'jpg', 'jpeg', 'png' ])) {
            exit(json_encode(array(
                "status" => 0,
                "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin !"
            )));
        }
        $data = str_replace( ' ', '+', $data );
        $data = base64_decode($data);
    
        if ($data === false) {
            exit(json_encode(array(
                "status" => 0,
                "msg" => "Có lỗi xảy ra !"
            )));
        }
    } else {
        exit(json_encode(array(
            "status" => 0,
            "msg" => "Sai Định Dạng Ảnh"
        )));
    }
    $name_img = md5(time().rand(1,1000));
    $file_img_sql = "theme/images/banner/{$name_img}.{$type}";
    file_put_contents("../../theme/images/banner/{$name_img}.{$type}", $data);

    $genres = $post_['Category'];
    foreach ($_POST['genres_id'] as $value){
        $genres .= $conn->query("SELECT `label` FROM `comics_genres` WHERE id = ".$value)->fetch_assoc()['label'];
    }

    $conn->query("INSERT INTO `comics`(`name`, `other_name`, `cover_image`, `authors`, `genres`, `description`, `status`, `comic_group`, `user`, `last_chapter`, `views`, `subscribe`, `hidden`, `adult`,) 
                    VALUES ('{$post_['Name']}', '{$post_['OtherName']}', '{$file_img_sql}', '{$post_['authorName']}', '{$genres}', '{$post_['Status']}', )");
/*
Category: "Manga"
IsAdult: "false"
Name: ""
OtherName: ""
Status: "Ongoing"
Summary: ""
TranslatorName: ""
artistName: ""
authorName: ""
csrf: "27fbd58a12cc9e6a7cc3810949f06fe3e1fe0498567f6d07b2a674cdfb80f182"
genres_id: ["20", "23", "25", "28", "30"]
 */

    