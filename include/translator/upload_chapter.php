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
                                        <select class="form-control select2">
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
                                        <input class="form-control" data-msg-required="Có Thể Bỏ Trống" name="name" />
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5">

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
                                readImage($("#cover_image")).done((base64Data) => {
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
                                                swal("Thành Công!", data.msg, "success").done(() => {
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