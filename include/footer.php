<!-- Modal Login -->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modal_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login_modal_label" style="color:white;">⛶ Đăng nhập tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_login" method="post">
                    <div class="form-group">
                        <label>❖ Username hoặc Email:</label>
                        <input type="text" class="form-control" name="username" placeholder="Vui lòng nhập Username Hoặc Email" required />
                    </div>
                    <div class="form-group">
                        <label>❖ Mật khẩu:</label>
                        <input type="password" class="form-control" name="password" placeholder="Vui lòng nhập mật khẩu" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" id="submit_login" class="btn btn-primary">Đăng nhập</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="register_modal_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="register_modal_label" style="color:white;">⛶ Đăng ký tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_register" method="post">
                    <div class="form-group">
                        <label>❖ Username:</label>
                        <input type="text" class="form-control" name="username" placeholder="Vui lòng nhập Username" required />
                    </div>
                    <div class="form-group">
                        <label>❖ Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Vui lòng nhập Email" required />
                    </div>
                    <div class="form-group">
                        <label>❖ Mật khẩu:</label>
                        <input type="password" class="form-control" name="password" placeholder="Vui lòng nhập mật khẩu" required />
                    </div>
                    <div class="form-group">
                        <label>❖ Nhập Lại Mật khẩu:</label>
                        <input type="password" class="form-control" name="repassword" placeholder="Vui lòng nhập lại mật khẩu" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" id="submit_register" class="btn btn-primary">Đăng Ký</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#submit_login").click(function() {
        $('#submit_login').prop('disabled', true);
        var data = $('#form_login').serializeArray();
        data.push({
            name: 'csrf',
            value: $("#csrf_key").val()
        });
        $.ajax({
            url: '/core/auth/login.php',
            type: 'post',
            dataType: 'json',
            data: data,
            success: function(data) {
                load_csrf();
                if (data.status == 200) {
                    swal("Thành Công", data.msg, "success");
                    setTimeout(function() {
                        //location.href = "/";
                    }, 2000);
                } else {
                    swal("Thất Bại", data.msg, "error");
                }
                $('#submit_login').prop('disabled', false);
            }
        });
    });

    $("#submit_register").click(function() {
        $('#submit_register').prop('disabled', true);
        if ($('#form_register input[name ="password"]').val() != $('#form_register input[name ="repassword"]').val()){
            swal("Thất Bại", "Mật khẩu nhập lại không khớp!", "error");
            $('#submit_register').prop('disabled', false);
            return;
        }
        var data = $('#form_register').serializeArray();
        data.push({
            name: 'csrf',
            value: $("#csrf_key").val()
        });
        $.ajax({
            url: '/core/auth/register.php',
            type: 'post',
            dataType: 'json',
            data: data,
            success: function(data) {
                load_csrf();
                if (data.status == 200) {
                    swal("Thành Công", data.msg, "success");
                    setTimeout(function() {
                        //location.href = "/";
                    }, 2000);
                } else {
                    swal("Thất Bại", data.msg, "error");
                }
                $('#submit_register').prop('disabled', false);
            }
        });
    });
    
</script>

<script>
    function load_csrf() {
        $.ajax({
            url: '/core/csrf.php',
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $("#csrf_key").val(data.csrf);
            }
        });
    }
    $(document).ready(function() {

        $(".mobile-toggle header").click(function() {
            $(this).parent().find(".listall_summary").toggle();
            $(this).parent().find(".sect-body").toggle();
        });
    });
    if ($('.show-hiden-animation').length >= 1) {
        setInterval(() => {
            $('.show-hiden-animation').hide();
        }, 400);
        setInterval(() => {
            $('.show-hiden-animation').show();
        }, 800);
    }
</script>
</main>
<script src="/theme/scripts/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<footer id="footer">
    <div class="container">
        <span class="right">Liên hệ: <a href="mailto:{mail}" target="_blank" style="color: #5fff46">{mail}</a></span>
        <span>© 2020 Website Manga Việt Nam - {name_web}</span>
    </div>
</footer>
</body>

</html>