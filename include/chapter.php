
<div class="container chapter-container" style="margin-top:30px;">
   <div class="row d-block clearfix">
      <div class="col-12 col-lg-12">
         <section class="feature-section at-series clear" style="background-color: #f6f4ec;">
            <main class="section-body">
               <div class="top-part">
                  <div class="row"> 
                     <div class="col-12 col-md-12">
                        <div class="comic-chapter-info"> 
                            <p class="text-left"><a href="/"><i class="fas fa-home" style="color:black"></i></a> <b style="color:black">»</b> <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>"><?=$row_comic['name']?></a> <b style="color:black">»</b> <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>/chap-<?=$row_comic['last_chapter']?>">Chap <?=$get_['chapter']?></a></p></br>
                            <h4 class="text-left">
                                <b><?=$row_comic['name']?> - Chương <?=$get_['chapter']?></b> </br>
                                <small> (Cập nhật lúc: <?=date("Y-m-d H:i:s", $row_comic['last_update'])?>)</small>
                            </h4>
                        </div>    
                            <div class="manga-action">
                            <?php    
                                if ($get_['chapter'] > 1){
                            ?>
                                 <div class="button button-back">
                                    <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>/chap-<?=($row_chapter['chapter'] - 1)?>"><i class="fas fa-arrow-left"></i></a>
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
                                    <a href="/<?=strtolower($type_comic)?>/<?=str_replace(" ", "-", $row_comic['name'])?>/<?=$row_comic['id']?>/chap-<?=($row_chapter['chapter'] + 1)?>"><i class="fas fa-arrow-right"></i></a>
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
                           
                                <img src="{url_image}" />
                            
                        </div>
                     </div>
                  </div>
               </div>
            </main>
         </section>
      </div>
  
   </div>
</div>
