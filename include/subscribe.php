<div class="container chapter-container" style="margin-top:30px;">
    <div class="row d-block clearfix">
        <div class="col-12 col-md-12">
            <section class="volume-list at-series basic-section">
                <header id="volume_11200" class="sect-header">
                    <span class="sect-title">
                        Truyện đã theo dõi
                    </span>
                </header>
                <main class="d-lg-block" style="min-height:800px;">
                    <table class="table table-borderless listext-table has-covers">
                        <tr>
                            <th class="col-md-8">Tên truyện</th>
                            <th class="none table-cell-m col-md-4">Chương Mới Nhất</th>
                        </tr>
                        <?php 
                        $sql_sub_comic = "SELECT * FROM `comics_subscribe` WHERE `user` = ".client()['id'];
                        $query_new_comic_num = $conn->query($sql_sub_comic);

                        $page = (int)(empty($_GET["page"]) ? 1 : $_GET["page"]);
                        if ($page <= 0){ $page = 1;}
                        $startpoint = ($page * $per_page) - $per_page;
                        $total_comic = $query_new_comic_num->num_rows;
                        $total_pages = ceil($total_comic / $per_page);
                        echo $total_pages;
                        if ($total_comic > 0){
                            echo $sql_sub_comic. " ORDER BY date DESC LIMIT {$startpoint} , {$per_page}";
                            $query_new_comic = $conn->query($sql_sub_comic. " ORDER BY date DESC LIMIT {$startpoint} , {$per_page}");
                            while($row_comic_sub = $query_new_comic->fetch_array()){
                                $query_history = $conn->query("SELECT * FROM `comics` WHERE `id` = {$row_comic_sub['id']}");
                                if ($query_history->num_rows > 0){
                                $row_history = $query_history->fetch_assoc();
                                $genres_comic = explode(",", $row_history['genres']);
                                $type_comic = $genres_comic[0];
                        ?>
                        <tr>
                            <td>
                                <div class="a6-ratio series-cover">
                                    <div class="content img-in-ratio" style="background-image: url('<?=$row_history['cover_image']?>')"></div>
                                </div>
                                <div class="series-name">
                                    <a href=""><b>[ <?=$type_comic?> ] <?=$row_history['name']?></b></a>
                                    <small class="type-translation">Tác giả: <?=$row_history['authors']?></small>
                                    <small class="type-translation">Nhóm dịch: <?=translate_group($row_history['comic_group'])['name_group']?></small>
                                </div>
                            </td>
                            <td class="none table-cell-m">
                                <a href="">Chương <?=$row_history['name']?></a>
                                <small class="volume-name">(Ngày đăng <?=$row_history['last_update']?>)</small>
                            </td>
                        </tr>
                        <?php 
                                }
                            }
                        } else {
                        ?>
                        <tr>
                            <td colspan="3">Không Có Dữ Liệu</td>
                        </tr>
                        <?php
                        }    
                        ?>

                    </table>
                </main>
                <hr />
                    <div class="pagination-footer">
                        <?php 
                        if ($total_comic > $per_page){
                            echo createLinks(2, $total_comic, $per_page, $page, $url);
                        }
                        
                        ?>
            </section>
        </div>

    </div>
</div>
