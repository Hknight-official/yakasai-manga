<?php 
include("./system/init.php");


    if (empty($get_['widget'])){
        $widget = "main";
    } else {
        $widget = $get_['widget'];
    }

    switch ($widget){
        case "main":
            $sql_main = "";
            $type_manga_url = "manga";
            if (isset($get_['type_manga'])){
                $type_manga_url = $get_['type_manga'];
                switch($get_['type_manga']){
                    case "manga": $sql_main = " AND `genres` LIKE '%manga%'"; break;
                    case "manhua": $sql_main = " AND `genres` LIKE '%manhua%'"; break;
                    case "manhwa": $sql_main = " AND `genres` LIKE '%manhwa%'"; break;
                    default: exit();
                }    
            }
            $title = "Website Truyện Tranh";
            include("./include/header.php");
            include("./include/main.php");
            include("./include/footer.php");
        break; 
        case "search":
            $title = "Kết quả tìm kiếm";
            $genres_array = [];
            $rejectGenres_array = [];
            if (isset($get_['selectgenres'], $get_['rejectgenres'], $get_['title'], $get_['author'], $get_['type_manga'], $get_['status'])){
                $url = "/?widget=search&selectgenres={$get_['selectgenres']}&rejectgenres={$get_['rejectgenres']}&title={$get_['title']}&author={$get_['author']}&type_manga={$get_['type_manga']}&status={$get_['status']}";
                $genres_array = explode(",", $get_['selectgenres']);
                
                $rejectGenres_array = explode(",", $get_['rejectgenres']);
            } else if (isset($get_['title'])) {
                $url = "/?widget=search&title={$get_['title']}";
            }else  if (isset($get_['type_manga'])) {
                $url = "/?widget=search&type_manga={$get_['type_manga']}";
            }else if (isset($get_['selectgenres'])) {
                $url = "/?widget=search&selectgenres={$get_['selectgenres']}";
                $genres_array = explode(",", $get_['selectgenres']);
            }else {
                $url = "/?widget=search";
            }
            include("./include/header.php");
            include("./include/search.php");
            include("./include/footer.php");
        break;     
        case "manga":
            if (empty($get_['id']) || empty($get_['name'])){
                header("location: /");
                exit();
            }
            $id_comic = escape_input($get_['id']);
            $query = $conn->query("SELECT * FROM `comics` WHERE id = {$id_comic}");
                if ($query->num_rows < 1){
                    header("location: /");
                    exit();
                }
            $row_comic = $query->fetch_array(MYSQLI_ASSOC);
            $title = $row_comic['name'];
            include("./include/header.php");
            include("./include/comic_info.php");
            include("./include/footer.php");
        break;    
        case "chapter":
            if (empty($get_['id']) || empty($get_['name']) || empty($get_['chapter'])){
                header("location: /");
                exit();
            }
            $id_comic = escape_input($get_['id']);
            $query = $conn->query("SELECT * FROM `comics` WHERE id = {$id_comic}");
                if ($query->num_rows < 1){
                    header("location: /");
                    exit();
                }
            $row_comic = $query->fetch_array(MYSQLI_ASSOC);
            $type_comic = explode(",", $row_comic['genres'])[0];
            $title = $row_comic['name']. " chapter".$get_['chapter'];
            if ($get_['chapter'] < 0 || $get_['chapter'] > $row_comic['last_chapter']){
                header("location: /");
                exit();
            }
            include("./include/header.php");
            include("./include/chapter.php");
            include("./include/footer.php");
        break;
        case "chapter":
            if (empty($get_['id']) || empty($get_['name']) || empty($get_['chapter'])){
                header("location: /");
                exit();
            }
            $id_comic = escape_input($get_['id']);
            $query = $conn->query("SELECT * FROM `comics` WHERE id = {$id_comic}");
                if ($query->num_rows < 1){
                    header("location: /");
                    exit();
                }
            $row_comic = $query->fetch_array(MYSQLI_ASSOC);
            $type_comic = explode(",", $row_comic['genres'])[0];
            $title = $row_comic['name']. " chapter".$get_['chapter'];
            if ($get_['chapter'] < 0 || $get_['chapter'] > $row_comic['last_chapter']){
                header("location: /");
                exit();
            }
            include("./include/header.php");
            include("./include/chapter.php");
            include("./include/footer.php");
        break;
        case "upload":
            $title = "Tạo Truyện Mới";
            if (client()['translater'] == 0){
                header("location: /");
                exit();
            }
            include("./include/header.php");
            include("./include/upload_comic.php");
            include("./include/footer.php");
        break;
    }    
    
    
  