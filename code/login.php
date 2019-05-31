
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Đăng nhập</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS  -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Dashboard CSS -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <!-- Fonts and icons -->
    <link href="../assets/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/icon.css" />
    <!-- Style of me -->
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">No Hope Center</a>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page-background" style="background-image: url('../assetsKIT/img/101.png') ">
        <div class="full-page login-page" filter-color="black">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <br>
                            <div class="card card-login">
                                <div class="card-header text-center" data-background-color="rose">
                                    <h4 class="card-title">Đăng nhập</h4>
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <div class="card-content">
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tài khoản</label>
                                            <input type="text" class="form-control" id="taikhoan">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Mật khẩu</label>
                                            <input type="password" class="form-control" id="matkhau">
                                        </div>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="button" class="btn btn-rose btn-simple btn-wd btn-lg" onclick="login()">Let's go</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy;2019 No Hope, Study and Succeed afterward
                    </p>
                </div>
            </footer>
        </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/jquery.validate.min.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    function login() {
        var tk = $('#taikhoan').val();
        var mk = $('#matkhau').val();
        $.get("modules/dangnhap.php",{tk:tk,mk:mk},function (data) {
            if(data == 4){
                swal({
                    title: "Đăng nhập thành công",
                    text: "Quyền: Học viên",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    type: "success"
                }).then(function () {
                    window.location.href = "hocvien_lop.php?tk="+tk;
                });
            }else if(data == 3){
                swal({
                    title: "Đăng nhập thành công",
                    text: "Quyền: Giáo viên",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    type: "success"
                }).then(function () {
                    window.location.href = "giaovien_lop.php?tk="+tk;
                });
            }else if (data == 2){
                swal({
                    title: "Đăng nhập thành công",
                    text: "Quyền: Admin",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    type: "success"
                }).then(function () {
                    window.location.href = "admin_lop.php?tk="+tk;
                });
            }else {
                swal({
                    title: 'Đăng nhập thất bại',
                    text: 'Sai tài khoản hoặc mật khẩu',
                    type: 'error',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).then(function () {
                    location.reload();
                })
            }
        })
    }
</script>
</html>