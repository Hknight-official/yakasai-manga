
<div class="container chapter-container" style="margin-top:30px;">
   <div class="row d-block clearfix">
      <div class="col-12 col-md-12">
         <section class="feature-section at-series clear" style="background-color: #f6f4ec;">
            <main class="section-body">
               <div class="top-part">
                        <div class="comic-chapter-info"> 
                            <p class="text-left"><a href="/"><i class="fas fa-home" style="color:black"></i></a> <b style="color:black">»</b> <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>"><?=$row_comic['name']?></a> <b style="color:black">»</b> <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>/chap-<?=$get_['chapter']?>">Chap <?=$get_['chapter']?></a></p></br>
                            <h4 class="text-left">
                                <b><?=$row_comic['name']?> - Chương <?=$get_['chapter']?></b> </br>
                                <small> (Cập nhật lúc: <?=$row_comic['last_update']?>)</small>
                            </h4>
                        </div>    
                            <div class="manga-action">
                            <?php    
                                if ($get_['chapter'] > 1){
                            ?>
                                 <div class="button button-back">
                                    <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>/chap-<?=($get_['chapter'] - 1)?>"><i class="fas fa-arrow-left"></i></a>
                                </div>
                            <?php
                                }
                            ?>    
                                    <select class="form-control chapter-select" onchange="location = this.value;">
                                        <?php 
                                            $query_chapter = $conn->query("SELECT * FROM `comics_chapters` WHERE `comic` = '{$row_comic['id']}' ORDER BY id DESC");
                                            if ($query_chapter->num_rows > 0){
                                                while($row_chapter = $query_chapter->fetch_array()){
                                                    $selected_chap = ($row_chapter['chapter'] == $get_['chapter']) ? "selected" : "";
                                        ?>            
                                            <option <?=$selected_chap?> value="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>/chap-<?=$row_chapter['chapter']?>">Chap <?=$row_chapter['chapter']?></option>
                                        <?php            
                                                }
                                            }
                                        ?>
                                    </select>
                            <?php    
                                if ($get_['chapter'] < $row_comic['last_chapter']){
                            ?>    
                                <div class="button button-forward">
                                    <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>/chap-<?=($get_['chapter'] + 1)?>"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            <?php
                                } else {
                            ?>
                                <div class="button button-forward" style="background-color:tomato;">
                                    <a class="disabled"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            <?php
                                }
                            ?>     
                            </div></br>
                        <div class="comic-chapter-img justify-content-center">
                           
                                <?php 
                                    $query_chapter_img = $conn->query("SELECT * FROM `comics_chapters` WHERE `comic` = '{$row_comic['id']}' AND `chapter` = '{$get_['chapter']}' ORDER BY id DESC");
                                    if ($query_chapter->num_rows > 0){
                                        $row_chapter_img = $query_chapter_img->fetch_assoc()['images'];
                                        foreach (json_decode($row_chapter_img) as $key_img => $value_img){
                                            $key_img = $conn->query("SELECT key_img FROM `images_server` WHERE `id` = ".$value_img)->fetch_assoc()['key_img'];
                                ?>
                                    <img class="img_order" src="/core/img.php?key=<?=hash("sha256", $key_img.$key_general_img);?>&id=<?=$value_img?>" />
                                <?php
                                        }
                                    } else {
                                        echo "Không tìm thấy chapter";
                                    }
                                    
                                ?>
                            <script>
                                $(document).ready(function() {
                                    $(document).imageOrder(".img_order");
                                });
                            </script>    
                        </div>
                        <div class="manga-action">
                            <?php    
                                if ($get_['chapter'] > 1){
                            ?>
                                 <div class="button button-back">
                                    <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>/chap-<?=($get_['chapter'] - 1)?>"><i class="fas fa-arrow-left"></i></a>
                                </div>
                            <?php
                                }
                            ?>    
                                    <select class="form-control chapter-select">
                                        <?php 
                                            $query_chapter = $conn->query("SELECT * FROM `comics_chapters` WHERE `comic` = '{$row_comic['id']}' ORDER BY id DESC");
                                            if ($query_chapter->num_rows > 0){
                                                while($row_chapter = $query_chapter->fetch_array()){
                                                    $selected_chap = ($row_chapter['chapter'] == $get_['chapter']) ? "selected" : "";
                                        ?>            
                                            <option <?=$selected_chap?>><a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>/chap-<?=$row_chapter['chapter']?>">Chap <?=$row_chapter['chapter']?></a></option>
                                        <?php            
                                                }
                                            }
                                        ?>
                                    </select>
                            <?php    
                                if ($get_['chapter'] < $row_comic['last_chapter']){
                            ?>    
                                <div class="button button-forward">
                                    <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>/chap-<?=($get_['chapter'] + 1)?>"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            <?php
                                } else {
                            ?>
                                <div class="button button-forward" style="background-color:tomato;">
                                    <a class="disabled"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            <?php
                                }
                            ?>     
                            </div></br></br>
                     
               </div>
            </main>
         </section>

         <section class="volume-list at-series basic-section">
            <header id="volume_11200" class="sect-header">
               <span class="sect-title">
               Bình Luận
               </span>
            </header>
            <main class="d-lg-block">
               <div class="row">
                  <div class="col-1 col-md-1"></div>              
                  <div class="col-10 col-md-10">
                     <div id="fb-root"></div>
                     <div class="fb-comments" data-href="http://yakasai.net/comment/comics/<?=$row_comic['id']?>" data-width="100%" data-numposts="10"></div>
                     <script>
                        $(window).resize(function(){$('.fb-comments iframe,.fb-comments span:first-child').css({'width':$('#commentboxcontainer').width()});});
                     </script>
                  </div>
                  <div class="col-1 col-md-1"></div> 
               </div>
            </main>
         </section>

      </div>
  
   </div>
</div>
