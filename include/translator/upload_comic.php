<div class="container chapter-container" style="margin-top:30px;">
    <div class="row d-block clearfix">
    <div class="col-12 col-md-12">
            <section class="feature-section at-series clear" style="background-color: #f6f4ec;">
                <main class="section-body">
                    <div class="top-part">


                        <form id="form_comic_create_chapter" method="post">
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Truyện:</label>
                                        <select class="form-control select2" name="id_comics">
                                            <?php 
                                                $query_ = $conn->query("SELECT * FROM `comics` WHERE `user` = ".client()['id']);
                                                if ($query_->num_rows > 0){
                                                    while($row_ = $query_->fetch_assoc()){
                                            ?>
                                            <option value="<?=$row_['id']?>"><?=$row_['name']?></option>
                                            <?php            
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <script>
                                            $('.select2').select2();
                                        </script>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tên Chap:</label>
                                        <input class="form-control" placeholder="Có Thể Bỏ Trống" name="name" />
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Chapter:</label>
                                        <input class="form-control" placeholder="" type="number" name="chapter" value="1" />
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh Truyện: (Đường dẫn ftp)</label>
                                        <textarea class="form-control" rows="8" id="images_s" placeholder="/tenmanga/anh1.jpg|/tenmanga/anh2.jpg"></textarea>
                                        <input type="hidden" name="rootdir" value="<?=client()['id']?>" />
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <label></label>            
                                </div>
                            </div>
                            </br>               
                            <section id="bottom_bar">
                                <div class="container-fluid">
                                    <button class="btn btn-primary btn-raised" type="button" id="create_comic_chapter">Đăng</button>
                                </div>
                            </section>
                        </form>
                        <script>
                            
                        </script>                    


                    </div>
                </main>
            </section>
        </div>

        <div class="col-12 col-md-12">
            <section class="feature-section at-series clear" style="background-color: #f6f4ec;">
                <main class="section-body">
                    <div class="top-part">


                        <form id="form_comic_create" method="post">
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Manga Name <span class="text-danger">*</span></label>
                                        <input class="form-control required" data-msg-required="Manga Name bắt buộc nhập" data-val="true" data-val-required="The Name field is required." id="Name" name="Name" type="text" value="" />
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Other Name</label>
                                        <input class="form-control" id="OtherName" name="OtherName" type="text" value="" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Author</label>
                                        <input type="text" name="authorName" value="" class="form-control maxlength" data-max="255" data-msg-maxlength="Không thể dài hơn 255 ký tự" />
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group label-static">
                                        <label class="control-label">Artist</label>
                                        <input type="text" name="artistName" value="" class="form-control maxlength" data-max="255" data-msg-maxlength="Không thể dài hơn 255 ký tự" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nhóm Dịch<span class="text-danger">*</span></label>
                                        <input class="form-control required maxlength" id="TranslatorName" type="text" value="<?=translate_group(client()['group'])['name_group']?>" disabled />
                                        <input type="hidden" name="TranslatorName" value="<?=translate_group(client()['group'])['id']?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Cảnh báo nội dung 18+</label>
                                        <input data-val="true" data-val-required="The IsAdult field is required." id="IsAdult" name="IsAdult" type="checkbox" value="true" /><input name="IsAdult" type="hidden" value="false" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-10">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Giới Thiệu<span class="text-danger">*</span></label>
                                        <textarea class="form-control required" data-msg-required="Summary bắt buộc nhập" name="Summary"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Loại Truyện</label>
                                        <select name="Category" class="form-control">
                                            <option value="Manga" selected>Manga</option>
                                            <option value="Manhua">Manhua</option>
                                            <option value="Manhwa">Manhwa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trạng Thái</label>
                                            <select class="form-control" data-val="true" data-val-required="The Status field is required." id="Status" name="Status">
                                                <option selected="selected" value="Ongoing">Ongoing</option>
                                                <option value="Delay">Delay</option>
                                                <option value="Cancel">Cancel</option>
                                                <option value="Done">Done</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label class="control-label">Thể Loại:</label>
                                <div class="row" style="margin-left:20px;">
                                            <?php
                                            $query_genres = $conn->query("SELECT * FROM `comics_genres`");
                                            while ($row_genres = $query_genres->fetch_array()){
                                            ?>
                                            <div class="col-md-4">
                                                <input type="checkbox" class="form-check-input" name="genres_id[]" value="<?=$row_genres['id']?>" id="genres<?=$row_genres['id']?>">
                                                <label style="margin-left:3px;" class="form-check-label" for="genres<?=$row_genres['id']?>"> <?=$row_genres['label']?></label>  
                                            </div>
                                            <?php
                                            }
                                            ?>
                                </div>
                            </div> </br>
                            <div class="form-group">
                                <label>Ảnh Bìa:</label>
                                <div class="col-4">
                                    <input class="form-control" type="file" id="cover_image" accept="image/*" />
                                </div>
                            </div>
                            </br>               
                            <section id="bottom_bar">
                                <div class="container-fluid">
                                    <button class="btn btn-primary btn-raised" type="button" id="create_comic">Tạo Mới</button>
                                </div>
                            </section>
                        </form>
                        <script>
                            //form_comic
                            $("#create_comic").click(() => {
                                $('#create_comic').prop('disabled', true);
                                var data = $('#form_comic_create').serializeArray();
                                data.push({
                                    name: 'csrf',
                                    value: $("#csrf_key").val()
                                });
                                readImage($("#cover_image")).then((base64Data) => {
                                    data.push({
                                        name: 'cover_image',
                                        value: base64Data
                                    });
                                    $.ajax({
                                        url: '/core/trans/create_comic.php',
                                        type: 'post',
                                        dataType: 'json',
                                        data: data,
                                        success: function(data) {
                                            load_csrf();
                                            if (data.status == 1){
                                                swal("Thành Công!", data.msg, "success").then(() => {
                                                    location.href = "/";
                                                });
                                            } else {
                                                swal("Thất Bại!", data.msg, "error");
                                            }
                                            $('#create_comic').prop('disabled', false);
                                        }
                                    });
                                });
                                
                            });

                            //form_comic_chapter
                            $("#create_comic_chapter").click(() => {
                                $('#create_comic_chapter').prop('disabled', true);
                                var data = $('#form_comic_create_chapter').serializeArray();
                                data.push({
                                    name: 'csrf',
                                    value: $("#csrf_key").val()
                                });
                                data.push({
                                    name: 'images',
                                    value: $("#images_s").val().replace(/<br\s*\/?>/mg,"\n")
                                });
                                    $.ajax({
                                        url: '/core/trans/create_chapter.php',
                                        type: 'post',
                                        dataType: 'json',
                                        data: data,
                                        success: function(data) {
                                            load_csrf();
                                            if (data.status == 1){
                                                swal("Thành Công!", data.msg, "success").then(() => {
                                                    location.href = data.url;
                                                });
                                            } else {
                                                swal("Thất Bại!", data.msg, "error");
                                            }
                                            $('#create_comic_chapter').prop('disabled', false);
                                        }
                                    });
                            });

                            function readImage(inputElement) {
                                var deferred = $.Deferred();

                                var files = inputElement.get(0).files;
                                if (files && files[0]) {
                                    var fr= new FileReader();
                                    fr.onload = function(e) {
                                        deferred.resolve(e.target.result);
                                    };
                                    fr.readAsDataURL( files[0] );
                                } else {
                                    deferred.resolve(undefined);
                                }

                                return deferred.promise();
                            }
                        </script>                    


                    </div>
                </main>
            </section>
        </div>

    </div>
</div>