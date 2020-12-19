<div class="container chapter-container" style="margin-top:30px;">
    <div class="row d-block clearfix">
        <div class="col-12 col-md-12">
            <section class="volume-list at-series basic-section">
                <header id="volume_11200" class="sect-header">
                    <span class="sect-title">
                        Lịch Sử Đọc Truyện
                    </span>
                </header>
                <main class="d-lg-block" style="min-height:800px;">
                    <table class="table table-borderless listext-table has-covers">
                        <tr>
                            <th class="col-md-8">Tên truyện</th>
                            <th class="none table-cell-m col-md-4">Chương Vừa Đọc</th>
                        </tr>
                        <?php 
                        if (!empty($_COOKIE['history'])){
                            foreach($_COOKIE['history'] as $key => $value){
                                $query_history = $conn->query("SELECT * FROM `comics` WHERE `id` = {$key}");
                                $value_decode = json_decode($value, true);
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
                                    <a href=""><b><?=$row_history['name']?></b></a>
                                    <small class="type-translation"><?=$type_comic?></small>
                                    <small class="type-translation">Tác giả: <?=$row_history['authors']?></small>
                                    <small class="type-translation">Nhóm dịch: <?=translate_group($row_history['comic_group'])['id']?></small>
                                </div>
                            </td>
                            <td class="none table-cell-m">
                                <a href="">Chương <?=$value_decode[1]?></a>
                                <small class="volume-name">(Ngày Xem <?=date("Y-m-d h:i:s", $value_decode[0])?>)</small>
                            </td>
                        </tr>
                        <?php 
                                }
                            }
                        }    
                        ?>

                    </table>
                </main>
            </section>
        </div>

    </div>
</div>