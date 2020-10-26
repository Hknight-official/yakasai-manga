<main id="mainpart" class="at-index">
    <div style="text-align: center; margin: 0 auto 10px auto;"></div>
    <div class="container">
        <div class="row">

            <div id="rd-sidebar" class="col-12 col-lg-12 feature-section">
                <div class="row top-group">
                    <div class="col-12 no-push push-3-m col-md-6 no-push-l col-lg-12" style="padding-bottom:10px;">

                        <section id="recent-comments" class="daily-recent_views ml-2" style="border-color: #566573;">
                            <header class="title">
                                <span class="sts-bold div-radius"> <i class="fas fa-search-plus" style="color:white;"></i>  Tìm kiếm nâng cao</span>
                            </header><hr />
                            <main class="d-lg-block search-page">
                                <form class="search-form clear" method="get">
                                    <input type="hidden" name="widget" value="search" />
                                    <input class="search-form in col-8 col-md-9 col-lg-10" type="text" name="title" size="40" value="<?=@$get_['title']?>" />
                                    <button id="search-go" class="search-go_form search-form submit col-4 col-md-3 col-lg-2" type="submit" value="search_plus" >Tìm kiếm</button>
                                    <div style="clear: both;"></div>
                                    <span class="search-advance_toggle"><i class="fas fa-filter"></i> Tìm kiếm nâng cao</span>
                                    <div style="clear: both;"></div>
                                    <div class="search-advance" style="display: none;">
                                        <div class="row">
                                            <div class="col-12 col-md-8 col-lg-4" style="margin-bottom: 20px;">
                                                <div>
                                                    <div class="search-form_sub-name">Tác giả</div>
                                                    <input class="search-form search-form_sub form-control" type="text" name="author" size="40" placeholder="Có thể bỏ trống..." value="<?=@$get_['author']?>" />
                                                </div>
                                                <div style="margin-bottom: 20px;">
                                                    <div class="search-status-name">Mục Truyện</div>
                                                    <select class="form-control" name="type_manga">
                                                        <option value="" selected>Tất cả</option>
                                                        <option value="Manga" <?php if(strtolower(@$get_['type_manga']) == "manga"){echo "selected";} ?>>Manga</option>
                                                        <option value="Manhua" <?php if(strtolower(@$get_['type_manga']) == "manhua"){echo "selected";} ?>>Manhua</option>
                                                        <option value="Manhwa" <?php if(strtolower(@$get_['type_manga']) == "manhwa"){echo "selected";} ?>>Mangwa</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <div class="search-status-name">Tình trạng</div>
                                                    <select class="form-control" name="status">
                                                        <option value="" selected>Tất cả</option>
                                                        <option value="1" <?php if(@$get_['status'] == 1){echo "selected";} ?>>Đang tiến hành</option>
                                                        <option value="2" <?php if(@$get_['status'] == 2){echo "selected";} ?>>Tạm ngưng</option>
                                                        <option value="3" <?php if(@$get_['status'] == 3){echo "selected";} ?>>Hoàn thành</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="search-gerne col-12 col-lg-6">
                                                <div class="search-gerne_name">Thể loại</div>
                                                <div class="row">
                                                <?php 
                                                $query_genres = $conn->query("SELECT * FROM `comics_genres`");
                                                while ($row_genres = $query_genres->fetch_array()){
                                                ?>
                                                    <div class="search-gerne_item include col-4 col-md-3 col-lg-4 col-xl-3">
                                                        <label class="genre_label" data-genre-id="<?=$row_genres['id']?>" }}>
                                                            <span class="gerne-icon">
                                                                <?php 
                                                                if (!empty($genres_array) && count($genres_array) > 0 && !empty($genres_array[0])){
                                                                    if (check_genres ($genres_array, $row_genres['id'])){
                                                                        echo '<i class="fas fa-check" aria-hidden="true"></i>';
                                                                    } else if (check_genres ($rejectGenres_array, $row_genres['id'])){
                                                                        echo '<i class="fas fa-times" aria-hidden="true"></i>';
                                                                    } else {
                                                                        echo '<i class="far fa-square" aria-hidden="true"></i>';
                                                                    }
                                                                } else {
                                                                    echo '<i class="far fa-square" aria-hidden="true"></i>';
                                                                }
                                                                    
                                                                ?>
                                                                
                                                            </span>
                                                            <span class="gerne-name"><?=$row_genres['label']?></span>
                                                        </label>
                                                    </div>
                                                <?php 
                                                }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                                   
                            </main>
                        </section>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 feature-section">
                <section class="index-section thumb-section-flow last-chapter translation three-row ml-2">
                    <header class="section-title">
                        <span class="sts-bold div-radius"> <i class="fas fa-poll-h" style="color:white;"></i>Kết quả tìm kiếm</span>
                        <hr />
                    </header>
                    <main class="row">
              <?php 
                    $delay = 1;
                    $sql_search_comic = "SELECT * FROM `comics` WHERE 1";
                    
                    if (!empty($get_['type_manga'])){
                        $sql_search_comic .= " AND `genres` LIKE '%".$get_['type_manga']."%'";
                    }
                    if (!empty($get_['title'])){
                        $title_array = explode(" ", $get_['title']);
                        foreach ($title_array as $value_title){
                            $sql_search_comic .= " AND `name` LIKE '%".$value_title."%'";
                        }
                    }

                    if (!empty($get_['author'])){
                            $sql_search_comic .= " AND `authors` = '".$get_['author']."'";
                    }

                    if (!empty($get_['status'])){
                        $sql_search_comic .= " AND `status_comic` = ".$get_['status']."";
                }
                    
                    if (count($genres_array) > 0 && $genres_array[0] != ""){
                        foreach ($genres_array as $key_genres => $value_genres){
                            $genres_get_label = $conn->query("SELECT * FROM `comics_genres` WHERE id = {$value_genres}")->fetch_array(MYSQLI_ASSOC);
                            if (!empty($genres_get_label)){
                                $sql_search_comic .= " AND `genres` LIKE '%".$genres_get_label['label']."%'";
                            }
                            
                        }
                    }
                    if (count($rejectGenres_array) > 0 && $rejectGenres_array[0] != ""){
                        foreach ($rejectGenres_array as $key_reject_genres => $value_reject_genres){
                            $rejectGenres_get_label = $conn->query("SELECT * FROM `comics_genres` WHERE id = {$value_reject_genres}")->fetch_array(MYSQLI_ASSOC);
                            if (!empty($rejectGenres_get_label)){
                                $sql_search_comic .= " AND `genres` NOT LIKE '%".$rejectGenres_get_label['label']."%'";
                            }
                            
                        }
                    }
                    $query_new_comic_num = $conn->query($sql_search_comic);

                    $page = (int)(empty($_GET["page"]) ? 1 : $_GET["page"]);
                    if ($page <= 0){ $page = 1;}
                    $startpoint = ($page * $per_page) - $per_page;
                    $total_comic = $query_new_comic_num->num_rows;
                    $total_pages = ceil($total_comic / $per_page);
                    if ($total_comic > 0){
                        $query_new_comic = $conn->query($sql_search_comic. " ORDER BY date DESC LIMIT {$startpoint} , {$per_page}");
                        while($row_new_comic = $query_new_comic->fetch_array()){
                        $type_comic = explode(",", $row_new_comic['genres'])[0];
                ?>
                    <div class="thumb-item-flow col-6 col-lg-2 col-sm-2 animate__animated animate__fadeIn" style="animation-duration:<?=$delay?>s;">
                    <div class="thumb-wrapper">
                        <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_new_comic['name'])?>/<?=$row_new_comic['id']?>" title="Chương <?=$row_new_comic['last_chapter']?>">
                        <div class="a6-ratio">
                            <div class="content img-in-ratio lazyload" style="border-radius: 6px;border: 1px solid #ccc;" data-bg="<?=$row_new_comic['cover_image']?>"></div>
                        </div>
                        </a>
                        <div class="thumb-detail">
                            <div class="thumb_attr chapter-title" title="<?=$row_new_comic['name']?>"><?=$type_comic?></div>
                        <div class="thumb_attr volume-title"><a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_new_comic['name'])?>/<?=$row_new_comic['id']?>/chap-<?=$row_new_comic['last_chapter']?>" title="<?=$row_new_comic['name']?>">Chương <?=$row_new_comic['last_chapter']?></a></div>
                        </div>
                    </div>
                    <div class="thumb_attr series-title"><a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_new_comic['name'])?>/<?=$row_new_comic['id']?>" title="<?=$row_new_comic['name']?>"><?=$row_new_comic['name']?></a></div>
                    </div>
                <?php
                        $delay = $delay+0.2;
                        }
                    } else {
                        echo '<div class="col-md-12"><p class="text-center" style="font-size:20px;"><b>Không có kết quả tìm kiếm :< </b></p><center><img width="35%" src="https://vie.myanimespace.com/images/icons/add.png"></center></div>';
                    }
                ?>


                    </main>
                    <hr />
                    <div class="pagination-footer">
                        <?php 
                        if ($total_comic > $per_page){
                            echo createLinks(2, $total_comic, $per_page, $page, $url);
                        }
                        
                        ?>
                        
                    </div>
                </section>


            </div>




        </div>
    </div>
    <div style="text-align: center; margin: 0 auto 10px auto;"></div>
    <script>
        
    </script>    