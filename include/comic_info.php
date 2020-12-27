<?php
// [!] $row_comic là lấy dữ liệu truyện từ id trên url! dạng fetch_assoc
$genres_comic = explode(",", $row_comic['genres']);
$type_comic = $genres_comic[0];
$conn->query("UPDATE `comics` SET views = views + 1 WHERE id = {$row_comic['id']}");
/*$query_views = $conn->query("SELECT * FROM `comics_views` WHERE comic = {$row_comic['id']} AND day = ".(date("d")+0)." AND month = ".(date("m")+0)." AND week = ".(date("W")+0)." AND year = ".date("Y"));
if ($query_views->num_rows < 1){
    $conn->query("INSERT INTO `comics_views` (`comic`, `day`, `week`, `month`, `year`, `views`) VALUES ({$row_comic['id']}, ".date("d").", ".date("W").", ".date("m").", ".date("Y").", 1)");
} else {
    $id_view_comic = $query_views->fetch_array(MYSQLI_ASSOC)['id'];
    $conn->query("UPDATE `comics_views` SET views = views + 1 WHERE id = {$id_view_comic}");
}*/

?>
<div class="container" style="margin-top:30px;">
   <div class="row d-block clearfix">
      <div class="col-12 col-lg-8 float-left">
         <section class="feature-section at-series clear">
            <main class="section-body">
               <div class="top-part">
                  <div class="row">
                     <div class="left-column col-12 col-md-3">
                        <div class="series-cover">
                           <a href="/manga">
                              <div class="series-type">
                                <span><?=$type_comic?></span>
                               </div>
                           </a>
                           <div class="a6-ratio" style="border-radius: 6px;border: 1px solid #ccc;">
                              <div class="content img-in-ratio" style="background-image: url('<?=$row_comic['cover_image']?>')"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-9">
                        <div class="series-name-group">
                           <span class="series-name">
                           <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>"><?=$row_comic['name']?></a>
                           </span>
                        </div>
                        <div class="series-information">
                           <div class="series-gernes" x-data="{ more: false }">
                               <?php
                               $count_i = 0;
                               unset($genres_comic[0]);
                               $genres_display = "";
                               foreach ($genres_comic as $key => $value){
                                $value = ltrim($value, " ");
                                $id_genres = $conn->query("SELECT * FROM `comics_genres` WHERE `label` like '%{$value}%'")->fetch_array()['id'];
                                if ($count_i <= 5){
                                ?>
                                <a class="series-gerne-item genres-item" href="/the-loai/<?=$id_genres?>"><?=$value?></a>
                                <?php
                                } else {
                               ?>
                               <a class="series-gerne-item animation genres-item" style="display: none;" x-show="more" :class="{ 'fade-in': more }" href="/the-loai/<?=$id_genres?>"><?=$value?></a>
                               <?php
                                }
                               $count_i++;
                               }
                               if ($count_i > 5){
                                   echo '<a class="series-gerne-item genres-item" href="javascript:void(0)" x-show="!more" @click="more = true;"><i class="fas fa-ellipsis-h"></i></a>';
                               }
                               ?>
                              
                           </div>
                           <div class="info-item">
                              <span class="info-name">Tên Khác:</span>
                              <span class="info-value">
                              <a><?=$row_comic['other_name']?></a>
                              </span>
                            </div>
                           <div class="info-item">
                              <span class="info-name">Tác giả:</span>
                              <span class="info-value "><?=$row_comic['authors']?></span>
                           </div>
                           <div class="info-item">
                              <span class="info-name">Tình trạng:</span>
                              <span class="info-value">
                              <a><?=$row_comic['status']?></a>
                              </span>
                           </div>
                           <div class="info-item">
                              <span class="info-name">Thống Kê:</span>
                              <span class="info-value">
                              <a>
                               <!-- <span class="statis-comic"><i class="fas fa-star"></i> <span class="sp02 number-like">4,9</span></span>-->
                                <span class="statis-comic"><i class="fas fa-heart"></i> <span class="sp02">19,949</span></span> 
                                <span class="statis-comic"><i class="fas fa-eye"></i> <span class="sp02"><?=number_format($row_comic['views'])?></span></span></a>
                              </span>
                            </div>
                           
                        </div>
                        <div class="side-features">
                           <div class="row">
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="bottom-part">
                  <div class="row">
                     <div class="summary-wrapper col-12">
                        <div class="series-summary">
                           <h4>Tóm tắt</h4>
                           <div class="summary-content">
                               <?=nl2br($row_comic['description'])?>
                           </div>
                           <div class="summary-more none more-state">
                              <div class="see_more">Xem thêm</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </main>
         </section>
         <section class="volume-list at-series basic-section">
            <header id="volume_11200" class="sect-header">
               <span class="sect-title">
               Danh sách chương (<?=$conn->query("SELECT id FROM `comics_chapters` WHERE comic = {$row_comic['id']}")->num_rows?>)
               </span>
            </header>
            <main class="d-lg-block">
               <div class="row">
                  <div class="col-12 col-md-12">
                     <ul class="list-chapters at-series" style="overflow: auto;max-height: 200px;">
                        <?php 
                        $query_chapter = $conn->query("SELECT * FROM `comics_chapters` WHERE `comic` = {$row_comic['id']} ORDER BY `chapter` DESC");
                        if ($query_chapter->num_rows > 0){
                           while ($row_chapter = $query_chapter->fetch_array()){
                        ?>   
                        <li class="">
                           <div class="chapter-name">
                              <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-",$row_comic['name'])?>/<?=$row_comic['id']?>/chap-<?=$row_chapter['chapter']?>" title="<?=$row_comic['name']?>">Chương <?=$row_chapter['chapter']?> </a>
                           </div>
                           <div class="chapter-time"><?=$row_chapter['date']?></div>
                        </li>
                        <?php   
                           }
                        } else {
                        ?>
                        <li class="">
                           <div class="chapter-name">
                             Không Có Dữ Liệu Chương Truyện Này ! Vui lòng liên hệ Translator Group
                           </div>
                           <div class="chapter-time"></div>
                        </li>
                        <?php
                        }
                        ?>
                        
                     </ul>
                  </div>
               </div>
            </main>
         </section>

         <section class="volume-list at-series basic-section" style="min-height:300px;">
            <header id="volume_11200" class="sect-header">
               <span class="sect-title">
               Bình Luận
               </span>
            </header>
            <main class="d-lg-block">
               <div class="row">
                  <div class="col-12 col-md-12">
                     <div id="fb-root"></div>
                     <div class="fb-comments" data-href="http://yakasai.net/comment/comics/<?=$row_comic['id']?>" data-width="100%" data-numposts="10"></div>
                     <script>
                        $(window).resize(function(){$('.fb-comments iframe,.fb-comments span:first-child').css({'width':$('#commentboxcontainer').width()});});
                     </script>
                  </div>
               </div>
            </main>
         </section>
      </div>
      <div id="rd-sidebar" class="col-12 col-lg-4 float-right">
         <div class="row top-group">
            <div class="col-12 no-push push-3-m col-md-6 no-push-l col-lg-12">
               <section class="series-users">
                  <main>
                     <div class="series-owner group-mem">
                        <img width="50px" height="50px" src="<?=client($row_comic['user'])['profile_image']?>" />
                        <div class="series-owner-title">
                           <span class="series-owner_name"><a href="/thanh-vien/<?=client($row_comic['user'])['id']?>"><?=client($row_comic['user'])['name']?></a></span>
                        </div>
                     </div>
                     <div class="fantrans-section">
                        <div class="fantrans-name">Nhóm dịch</div>
                        <div class="fantrans-value"><a href="/nhom-dich/<?=translate_group($row_comic['comic_group'])['id']?>"><?=translate_group($row_comic['comic_group'])['name_group']?></a></div>
                     </div>
                     
                  </main>
               </section>
               
               <section class="basic-section gradual-mobile">
                    <header class="sect-header">
                        <span class="sect-title">Fanpage Nhóm Dịch</span><span class="mobile-icon"><i class="fas fa-chevron-down"></i></span>
                    </header>
                    <main class="d-lg-block">
                       <iframe src="https://www.facebook.com/plugins/page.php?href=<?=translate_group($row_comic['comic_group'])['fanpage']?>&tabs=timeline&width=345&height=450&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true" width="100%" height="450" scrolling="no" frameborder="0" allowtransparency="true" style="border: none; overflow: hidden;" ></iframe>
                    </main>
                </section>
               
            </div>
         </div>
      </div>
  
   </div>
</div>
