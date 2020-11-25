<div class="container chapter-container" style="margin-top:30px;">
    <div class="row d-block clearfix">
        <div class="col-12 col-md-12">
            <section class="feature-section at-series clear" style="background-color: #f6f4ec;">
                <main class="section-body">
                    <div class="top-part">


                        <form id="form_comic_create" method="post">
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
                                    <button class="btn btn-primary btn-raised" type="button" id="create_comic">Đăng</button>
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
                                            $('#create_comic').prop('disabled', false);
                                        }
                                    });
                            });
                        </script>                    


                    </div>
                </main>
            </section>
        </div>

    </div>
</div>