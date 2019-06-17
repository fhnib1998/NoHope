<?php
    ob_start();
    include("modules/kndatabase.php");
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
                    <img src="../assets/img/logo.png" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#quanlitk" class="collapsed">
                        Admin
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
                            <li>
                                <a href="admin_giaovien.php">Danh sách giáo viên</a>
                            </li>
                            <li class="active">
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
                <li>
                    <a href="admin_doanhthu.php">
                        <i class="material-icons">toys</i>
                        <p>Doanh thu</p>
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
                    <a class="navbar-brand">Thêm giáo viên</a>
                </div>
            </div>
        </nav>
        <!-- Nội Dung -->
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <b class="material-icons">person_add</b>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Thêm giáo viên</h4>
                            <form id="themgiaovien" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="checktaikhoan" class="form-group label-floating">
                                            <label class="control-label">Tài khoản</label>
                                            <input type="text" class="form-control" id="taikhoan" name="taikhoan">
                                            <code class="hidden" id="loitaikhoan"></code>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="checkmatkhau" class="form-group label-floating">
                                            <label class="control-label">Mật khẩu</label>
                                            <input type="password" class="form-control" id="matkhau" name="matkhau">
                                            <code class="hidden" id="loimatkhau"></code>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="checkhoten" class="form-group label-floating">
                                            <label class="control-label">Họ tên</label>
                                            <input type="text" class="form-control" id="hoten" name="hoten">
                                            <code class="hidden" id="loihoten"></code>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="checkngaysinh" class="form-group label-floating">
                                            <label class="control-label">Ngày sinh</label>
                                            <input type="text" class="form-control" id="ngaysinh">
                                            <code class="hidden" id="loingaysinh"></code>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="checksodienthoai" class="form-group label-floating">
                                            <label class="control-label">Số điện thoại</label>
                                            <input type="text" class="form-control" id="sodienthoai" name="sodienthoai">
                                            <code class="hidden" id="loisodienthoai"></code>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Số tài khoản</label>
                                            <input type="text" class="form-control" id="sotk" name="sotk">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trình độ</label>
                                            <textarea rows="2" class="form-control" id="trinhdo" name="trinhdo"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio" >
                                            <label>
                                                <input type="radio" name="gioitinh" id="nam" value="Nam" onclick="chonnam()">
                                                Nam
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gioitinh" id="nu" value="Nữ" onclick="chonnu()">
                                                Nữ
                                            </label>
                                        </div>
                                        <code class="hidden" id="loigioitinh"></code>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail img-circle">
                                                <img src="../assets/img/placeholder.jpg">
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
                            </form>
                            <br>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-rose" onclick="themgiaovien()" name="them">Thêm giáo viên</button>
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
<script>
    var checktk = 0;
    $(document).ready(function () {
        $("#taikhoan").blur(function () {
            var tk = $(this).val();
            if(tk==="") {
                document.getElementById("checktaikhoan").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loitaikhoan").setAttribute("class","");
                document.getElementById("loitaikhoan").innerHTML = "Tài khoản không được để trống";
                checktk=1;
            }
            else {
                $.get("modules/checktk.php",{tk:tk},function (data) {
                    if(data==1){
                        document.getElementById("checktaikhoan").setAttribute("class","form-group label-floating has-error");
                        document.getElementById("loitaikhoan").setAttribute("class","");
                        document.getElementById("loitaikhoan").innerHTML = "Tài khoản đã tồn tại";
                        checktk=1;
                    }
                    else {
                        document.getElementById("checktaikhoan").setAttribute("class","form-group label-floating");
                        document.getElementById("loitaikhoan").setAttribute("class","hidden");
                        checktk=0;
                    }
                });
            }
        });
        $("#matkhau").blur(function () {
            var mk = $(this).val();
            if(mk===""){
                document.getElementById("checkmatkhau").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loimatkhau").setAttribute("class","");
                document.getElementById("loimatkhau").innerHTML = "Mật khẩu không được để trống";
            }
            else {
                document.getElementById("checkmatkhau").setAttribute("class", "form-group label-floating");
                document.getElementById("loimatkhau").setAttribute("class", "hidden");
            }
        });
        $("#hoten").blur(function () {
            var hoten = $(this).val();
            if(hoten===""){
                document.getElementById("checkhoten").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loihoten").setAttribute("class","");
                document.getElementById("loihoten").innerHTML = "Họ tên không được để trống";
            }
            else {
                document.getElementById("checkhoten").setAttribute("class", "form-group label-floating");
                document.getElementById("loihoten").setAttribute("class", "hidden");
            }
        });
    });
    function themgiaovien() {
        var tk = $("#taikhoan").val();
        var mk = $("#matkhau").val();
        var hoten = $("#hoten").val();
        var ngaysinh = $("#ngaysinh").val();
        var sodienthoai = $("#sodienthoai").val();
        var trinhdo = $("#trinhdo").val();
        var sotk = $("#sotk").val();
        var gioitinh;
        if(document.getElementById("nam").checked){
            gioitinh = "Nam";
        }
        else if(document.getElementById("nu").checked){
            gioitinh = "Nữ";
        }
        else {
            document.getElementById("loigioitinh").setAttribute("class","");
            document.getElementById("loigioitinh").innerHTML = "&nbsp;Chưa chọn";
            checktk = 1;
        }
        if (!document.getElementById("avatar").files[0]){
            document.getElementById("loianh").setAttribute("class","");
            document.getElementById("loianh").innerHTML = "&ensp;Chưa chọn avatar";
            checktk = 1;
        } else {
            var file = document.getElementById("avatar").files[0];
            var avatar = file["name"];
            var fd = new FormData();
            fd.append('file',file);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'upfile.php', true);
            xhr.send(fd);
        }
        if(tk==="")
        {
            document.getElementById("checktaikhoan").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loitaikhoan").setAttribute("class","");
            document.getElementById("loitaikhoan").innerHTML = "Tài khoản không được để trống";
        }
        if(mk==="")
        {
            document.getElementById("checkmatkhau").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loimatkhau").setAttribute("class","");
            document.getElementById("loimatkhau").innerHTML = "Mật khẩu không được để trống";
        }
        if(hoten==="")
        {
            document.getElementById("checkhoten").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loihoten").setAttribute("class","");
            document.getElementById("loihoten").innerHTML = "Họ tên không được để trống";
        }
        if(tk!==""&&mk!==""&&hoten!==""&&checktk===0){
            $.get("modules/adddatabase.php",{taikhoangv:tk,matkhau:mk,hoten:hoten,ngaysinh:ngaysinh,sodienthoai:sodienthoai,trinhdo:trinhdo,gioitinh:gioitinh,avatar:avatar,sotk:sotk},function () {
                swal({
                    title: 'Thêm thành công!',
                    text: 'Thêm thành công giáo viên',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).then(function () {
                    window.location.href = "admin_giaovien.php";
                })
            });
        }
    }
    function chonnam() {
        document.getElementById("loigioitinh").setAttribute("class","hidden");
        checktk = 0;
    }
    function chonnu() {
        document.getElementById("loigioitinh").setAttribute("class","hidden");
        checktk = 0;
    }
</script>
</html>