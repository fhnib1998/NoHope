<?php
    ob_start();
    include("modules/kndatabase.php");
    if(isset($_GET["tk"])){
        $tk = $_GET["tk"];
        $sqlSelect = "select * from giaovien where tk ='$tk'";
        $result = mysqli_query($conn,$sqlSelect) or die("Lỗi câu truy vấn");
        $row = mysqli_fetch_row($result);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Quản lí giáo viên</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../assets/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/icon.css" />
    <!-- Style of me -->
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-active-color="blue" data-background-color="black" data-image="../assets/img/30904.jpg">
        <div class="logo">
            <a href="#" class="simple-text">
                No Hope Center
            </a>
        </div>
        <div class="logo logo-mini">
            <a class="simple-text">
                NHC
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="../assets/img/anime3.jpg" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#quanlitk" class="collapsed">
                        Hoàng Thanh Bình
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="quanlitk">
                        <ul class="nav">
                            <li>
                                <a href="#">
                                    <b class="material-icons">account_box</b>
                                    Thông tin
                                </a>
                            </li>
                            <li>
                                <a href="login.php">
                                    <b class="material-icons">power_settings_new</b>
                                    Đăng xuất
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li>
                    <a href="index.php">
                        <i class="material-icons">home</i>
                        <p>Trang chủ</p>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" href="#quanlilophoc">
                        <i class="material-icons">class</i>
                        <p>Quản lí lớp học
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="quanlilophoc">
                        <ul class="nav">
                            <li>
                                <a href="admin_lop.php">Danh sách lớp học</a>
                            </li>
                            <li>
                                <a href="admin_addlop.php">Thêm lớp học</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="active">
                    <a data-toggle="collapse" href="#quanligiaovien">
                        <i class="material-icons">school</i>
                        <p>Quản lí giáo viên
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse in" id="quanligiaovien">
                        <ul class="nav">
                            <li class="active">
                                <a href="admin_giaovien.php">Danh sách giáo viên</a>
                            </li>
                            <li>
                                <a href="admin_addgiaovien.php">Thêm giáo viên</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="admin_editweb.php">
                        <i class="material-icons">dashboard</i>
                        <p>Quảng cáo khóa học</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Danh sách giáo viên</a>
                </div>
            </div>
        </nav>

        <!-- Nội Dung -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="rose">
                                <b class="material-icons">account_box</b>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Sửa thông tin giáo viên</h4>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tài khoản</label>
                                                <input type="text" class="form-control" value="<?php echo $row[0]?>" id="taikhoan" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Mật khẩu</label>
                                                <input type="password" class="form-control" value="<?php echo $row[1]?>" id="matkhau">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Họ tên</label>
                                                <input type="text" class="form-control" value="<?php echo $row[2]?>" id="hoten">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Ngày sinh</label>
                                                <input type="text" class="form-control" value="<?php echo $row[3]?>" id="ngaysinh" ">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Số điện thoại</label>
                                                <input type="text" class="form-control" value="<?php echo $row[5]?>" id="sodienthoai">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Trình độ</label>
                                                <textarea class="form-control" id="trinhdo"><?php echo $row[6]?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio">
                                                <label class="radio">
                                                    <input type="radio" name="gioitinh" id="nam" value="Nam" <?php if($row[4]=="Nam"){ echo "checked";}?>>
                                                    Nam
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gioitinh" id="nu" value="Nữ" <?php if($row[4]=="Nữ"){ echo "checked";}?>>
                                                    Nữ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle">
                                                    <img src="<?php echo $row[7]?>">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                <div>
                                                    <span class="btn btn-round btn-primary btn-file">
                                                        <span class="fileinput-new">Chọn ảnh</span>
                                                        <span class="fileinput-exists">Thay đổi</span>
                                                        <input type="file" id="avatar" />
                                                    </span>
                                                </div>
                                            </div>
                                            <code class="hidden" id="loianh"></code>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-rose" onclick="suagiaovien()">Sửa thông tin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /Nội Dung -->

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">

                </nav>
                <p class="copyright pull-right">
                    &copy;2019 No Hope, Study and Succeed afterward
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../assets/js/moment.min.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../assets/js/fullcalendar.min.js"></script>
<!--	Plugin for Fileupload -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    function xacnhanxoa(tk) {
        swal({
            title: 'Xóa thật không?',
            text: 'Có không giữ mất đừng tìm nhé!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hỏi làm gì.Xóa đi',
            cancelButtonText: 'Không',
            confirmButtonClass: "btn btn-success",
            cancelButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).then(function() {
            swal({
                title: 'Đã xóa!',
                text: 'Mất tiêu luôn.',
                type: 'success',
                confirmButtonClass: "btn btn-success",
                buttonsStyling: false
            }).then(function () {
                window.location.href = "admin_giaovien.php?module=deldatabase&tkgv="+tk;
            })
        })
    }
    function suagiaovien() {
        var tk = $('#taikhoan').val();
        var mk = $('#matkhau').val();
        var hoten = $("#hoten").val();
        var ngaysinh = $("#ngaysinh").val();
        var sodienthoai = $("#sodienthoai").val();
        var trinhdo = $("#trinhdo").val();
        var gioitinh;
        if(document.getElementById("nam").checked){
            gioitinh = "Nam";
        }
        else if(document.getElementById("nu").checked){
            gioitinh = "Nữ";
        }
        var avatar = "";
        if (document.getElementById("avatar").files[0]) {
            var file = document.getElementById("avatar").files[0];
            var avatar = file["name"];
            var fd = new FormData();
            fd.append('file',file);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'upfile.php', true);
            xhr.send(fd);
        }
        if(avatar != ""){
            $.get("modules/updatedatabase.php",{tkgvad:tk,mk:mk,hoten:hoten,ngaysinh:ngaysinh,sodienthoai:sodienthoai,trinhdo:trinhdo,gioitinh:gioitinh,avatar:avatar},function () {
                swal({
                    title: 'Sửa thành công!',
                    text: 'Đã sửa thông tin giáo viên',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).then(function () {
                    window.location.href = "admin_giaovien.php";
                })
            })
        }else {
            $.get("modules/updatedatabase.php",{tkgvad:tk,mk:mk,hoten:hoten,ngaysinh:ngaysinh,sodienthoai:sodienthoai,trinhdo:trinhdo,gioitinh:gioitinh,avatar:""},function () {
                swal({
                    title: 'Sửa thành công!',
                    text: 'Đã sửa thông tin giáo viên',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).then(function () {
                    window.location.href = "admin_giaovien.php";
                })
            })
        }
    }
</script>
</html>
