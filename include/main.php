<div id="loader-wrapper">
	<div id="loader"></div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>
<script>
  window.addEventListener('load', function () {
    $('body').addClass('loaded');
  })
</script>  

<main id="mainpart" class="at-index">
  <div class="container" style="margin-bottom: 1em;">
    <div class="row"> 
      <div class="col-12 col-lg-9 feature-section" style="padding-top: 10px;padding-bottom: 10px;">
        <div class="daily-recent_views">
          <header class="title">
            <span class="top-tab_title title-active div-radius" style="background-color:#566573"> <i class="fas fa-heart" style="color:white;"></i>  Tiêu Điểm Trong Ngày</span>
            <hr />
          </header>
          
          <main class="row slider d-block">
            
            <?php 
                $delay = 2;
                $query = $conn->query("SELECT * FROM `comics` WHERE 1 {$sql_main} LIMIT 12");
                while($row = $query->fetch_array()){
                    
                    $type_comic = explode(",", $row['genres'])[0];
            ?>
            <div class="popular-thumb-item mr-1 animate__animated animate__zoomIn" style="animation-duration:<?=$delay?>s;">
              <div class="thumb-wrapper">
                <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row['name'])?>/<?=$row['id']?>" title="<?=$row['name']?>">
                  <div class="a6-ratio" style="border-radius: 6px;border: 1px solid #ccc;">
                    <div class="content img-in-ratio" style="background-image: url('<?=$row['cover_image']?>')"></div>
                  </div>
                </a>
                <div class="thumb-detail">
                  <div class="thumb_attr series-title" title="<?=$row['name']?>"><a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row['name'])?>/<?=$row['id']?>" title="<?=$row['name']?>"><?=$row['name']?></a></div>
                </div>
              </div>
            </div>
            <?php
                $delay = $delay+0.8;
                }
            ?>
            
          </main>
        </div>
      </div>
      <div class="col-12 col-lg-3 padding-none">
        <section id="recent-comments" class="basic-section ml-2" style="border-color: #566573;">
              <header class="sect-header" style="color:white;background-color:#566573;">
                          <span class="sect-title" style="font-size:16px;"><i class="fas fa-swatchbook"></i> Mục Truyện</span>
                      </header></br>
            <a href="/manga"><span class="sts-bold div-radius active-hover-comic"><i class="fas fa-journal-whills"></i> <b>Truyện Manga</b> 】</span></a></br></br>
            <a href="/manhua"><span class="sts-bold div-radius active-hover-comic2"><i class="fas fa-book"></i> <b>Truyện Manhua</b> 】</span></a></br></br>
            <a href="/manhwa"><span class="sts-bold div-radius active-hover-comic3"><i class="fas fa-bible"></i> <b>Truyện Manhwa</b> 】</span></a></br></br>
          </section>

          <section id="recent-comments" class="basic-section ml-2" style="border-color: #566573;">
            <header class="sect-header" style="color:white;background-color:#566573;">
            <?php 
              $query_schedule = $conn->query("SELECT id FROM `comics_schedule` WHERE `date` BETWEEN '".date("Y-m-d")." 00:00:00' AND '".date("Y-m-d")." 23:59:59'");
            ?>
                <span class="sect-title" style="font-size:16px;"> <i class="fas fa-bell"></i> Lịch truyện hôm nay (<?=$query_schedule->num_rows?>)</span>
            </header>
            <div class="outer" >
              <ul class="demo inner" style="list-style:none;padding:0px;margin:0px;max-height:135px;">
               <?php 
	       		  if ($query_schedule->num_rows > 0){
              while ($row_schedule = $query_schedule->fetch_array(MYSQLI_ASSOC)){
              ?>
		            <li class="news-item">
                  <table cellpadding="1">
                      <tr>
                          <td><p class="series-title"><b><a href=""><?=$row_schedule['name']?></a></b></p> » <strong> [ <?=date("H:i", strtotime($row_schedule['date']))?> ] </strong> - Chương <?=$row_schedule['chapter']?></td>
                      </tr>
                  </table>
                </li>
              <?php
                  }
                } else {
              ?>
		            <li class="news-item">
                  <table cellpadding="1">
                      <tr>
                          <td><p class="series-title"><strong>Không có truyện trong ngày hôm nay</strong></td>
                      </tr>
                  </table>
                </li>
              <?php
                }
              ?>
                
              </ul> 
              </div> 
                </br>
            </section>   
            <script type="text/javascript">
              function autoScrollDown(){
                  $(".inner").css({top:-$(".outer").outerHeight()}) // jump back
                            .animate({top:0},6000,"linear", autoScrollDown); // and animate
              }
              function autoScrollUp(){
                  $(".inner").css({top:0}) // jump back
                            .animate({top:-$(".outer").outerHeight()},6000,"linear", autoScrollUp); // and animate
              }
              // fix hight of outer:
              $('.outer').css({maxHeight: $('.inner').height()});
              // duplicate content of inner:
              $('.inner').html($('.inner').html() + $('.inner').html());
              autoScrollUp();
            </script>      

      </div>
    </div>
  </div>
  <div style="text-align: center; margin: 0 auto 10px auto;"></div>
  <div class="container" >
    <div class="row">
      <div class="col-12 col-md-12 feature-section">
        <section class="index-section thumb-section-flow last-chapter translation three-row ml-2">
          <header class="section-title">
            <span class="sts-bold div-radius"> <i class="fas fa-meteor" style="color:white;"></i>Truyện Vừa Đăng</span>
            <hr />
          </header>
          <main class="row">
            <!--
           <div class="thumb-item-flow col-6 col-lg-3">
              <div class="thumb-wrapper">
                <a href="/{type_manga}/{id_name_manga}" title="Chương {chapter}: {title_manga}">
                  <div class="a6-ratio">
                    <div class="content img-in-ratio lazyload" data-bg="{img_comic}"></div>
                  </div>
                </a>
                <div class="thumb-detail">
                    <div class="thumb_attr chapter-title" title="{title_manga}">{type_manga}</div>
                  <div class="thumb_attr volume-title"><a href="/{type_manga}/{id_name_manga}/{chapter}" title="{title_manga}">Chương {chapter}</a></div>
                </div>
              </div>
              <div class="thumb_attr series-title"><a href="/{type_manga}/{id_name_manga}" title="{title_manga}">{title_manga}</a></div>
            </div>
              -->
              
            <?php 
                $delay = 2;
                $query_new_comic = $conn->query("SELECT * FROM `comics` WHERE 1 {$sql_main} LIMIT {$per_page}");
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

                <div class="manga-info-top"><span class="badge badge-info"><time title="<?=$row_new_comic['date']?>" datetime="<?=$row_new_comic['date']?>" class="timeago"></time> trước</span><?php if (view_comic($row_new_comic['id'], date("Y-m-d H:i:s")) >= $hot_view){ ?><span class="badge badge-danger ml-1 pulse-animation show-hiden-animation">Hot</span><?php } ?></div>
              
              </div>
              <div class="thumb_attr series-title"><a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_new_comic['name'])?>/<?=$row_new_comic['id']?>" title="<?=$row_new_comic['name']?>"><?=$row_new_comic['name']?></a></div>
            </div>
            <?php
                $delay = $delay+0.2;
                }
            ?>
            
          </main>
          <hr />
        <div class="pagination-footer">
          <?php 
          $total_comic = $conn->query("SELECT * FROM `comics` WHERE 1 {$sql_main}")->num_rows;
          $url = "/?widget=search&type_manga=".$type_manga_url;
          $page = 1;
            if ($total_comic > $per_page){
              echo createLinks(2, $total_comic, $per_page, $page, $url);
            }          
          ?>
        </div>
        </section>
        
       
      </div>

   <!--    
      <div id="rd-sidebar" class="col-12 col-lg-4 comment-padding">
         <div class="row top-group">
            <div class="col-12 no-push push-3-m col-md-6 no-push-l col-lg-12">
               
               <section id="recent-comments" class="basic-section" style="border-color: #566573;">
         
          <header class="sect-header" style="color:white;background-color:#566573">
                        <span class="sect-title" style="font-size:16px;"><i class="fas fa-comments"></i> Bình luận Gần Đây</span>
                    </header>
          <main class="sect-body">

            <?php 
                $query_new_comment = $conn->query("SELECT * FROM `comics_comment` ORDER BY `date` DESC LIMIT 6 ");
                while($row_new_comment = $query_new_comment->fetch_array()){
                  $type_comic = explode(",", comic($row_new_comment['comic'])['genres'])[0];
            ?>
            <div class="comment-item-at-index">
                <div class="comment-top">
                  <div class="comment-user_ava">
                    <a href="/thanh-vien/{id_user}">
                      <img src="<?=client($row_new_comment['user'])['profile_image']?>">
                    </a>
                  </div>
                  <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", comic($row_new_comment['comic'])['name'])?>/<?=comic($row_new_comment['comic'])['id']?>/chap-<?=$row_new_comment['chapter']?>" rel="nofollow" class="comment-user_name strong"><?=client($row_new_comment['user'])['name']?></a>
                  <small class="comment-location">
                    <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", comic($row_new_comment['comic'])['name'])?>/<?=comic($row_new_comment['comic'])['id']?>/chap-<?=$row_new_comment['chapter']?>">
                      <time class="timeago" title="<?=$row_new_comment['date']?>" datetime="<?=$row_new_comment['date']?>">
                        <?=$row_new_comment['date']?>
                      </time>
                    </a>
                  </small>
                </div>
              <div class="comment-info">
                  <div class="comment-content">
                  <?=$row_new_comment['content']?>
                </div>
                <span class="series-name"><a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", comic($row_new_comment['comic'])['name'])?>/<?=comic($row_new_comment['comic'])['id']?>/chap-<?=$row_new_comment['chapter']?>"><?=comic($row_new_comment['id'])['name']?></a></span>
              </div>
            </div>
            
            <?php 
                }            
            ?>

          </main>
        </section>

        <section id="recent-comments" class="basic-section ml-2" style="border-color: #566573;">
            <header class="sect-header" style="color:white;background-color:#566573;">
                        <span class="sect-title" style="font-size:16px;"><i class="fas fa-swatchbook"></i> Mục Truyện</span>
                    </header></br>
          <a href="/manga"><span class="sts-bold div-radius active-hover-comic"><i class="fas fa-journal-whills"></i> <b>Truyện Manga</b> 】</span></a></br></br>
          <a href="/manhua"><span class="sts-bold div-radius active-hover-comic2"><i class="fas fa-book"></i> <b>Truyện Manhua</b> 】</span></a></br></br>
          <a href="/manhwa"><span class="sts-bold div-radius active-hover-comic3"><i class="fas fa-bible"></i> <b>Truyện Manhwa</b> 】</span></a></br></br>
        </section>
               
            </div>
         </div>
      </div>
              -->
      
    </div>
  </div>
  <div style="text-align: center; margin: 0 auto 10px auto;"></div>
  
  <div class="at-index">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12 basic-section">
          <section class="index-section new-series">
            <header class="section-title">
              <span class="sts-bold div-radius"> <i class="fas fa-chess-queen" style="color:white;"></i>TOP 6 Siêu Phẩm</span>
              <hr />
            </header>

            <main class="row">
                <?php 
                    $delay = 2;
                    $query_top = $conn->query("SELECT * FROM `comics` WHERE 1 {$sql_main} ORDER BY subscribe DESC, id DESC LIMIT 6");
                      while($row_top = $query_top->fetch_array()){
                      $type_comic = explode(",", $row_top['genres'])[0];
                ?>
                <div class="thumb-item-flow col-6 col-lg-2 col-sm-2 animate__animated animate__fadeIn" style="animation-duration:<?=$delay?>s;">
                  <div class="thumb-wrapper">
                    <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_top['name'])?>/<?=$row_top['id']?>" title="Chương <?=$row_top['last_chapter']?>">
                      <div class="a6-ratio">
                        <div class="content img-in-ratio lazyload" style="border-radius: 6px;border: 1px solid #ccc;" data-bg="<?=$row_top['cover_image']?>"></div>
                      </div>
                    </a>
                    <div class="thumb-detail">
                      <div class="thumb_attr volume-title" style="font-size:17px;color:white;"><a href="#"> « <b><?=number_format($row_top['subscribe'])?> theo dõi</b> » </a></div>
                    </div>
                  </div>
                  <div class="thumb_attr series-title"><a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_top['name'])?>/<?=$row_top['id']?>" title="<?=$row_top['name']?>"><?=$row_top['name']?></a></div>
                </div>
                <?php
                    $delay = $delay+0.2;
                    }
                ?>
            </main>

            
          </section>
        </div>
        <div class="col-12 col-md-2 col-lg-2"></div>
      </div>
    </div>
  </div>

