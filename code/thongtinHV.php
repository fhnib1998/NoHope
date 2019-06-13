<?php
    ob_start();
    session_start();
    include("modules/kndatabase.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Học viên</title>
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
                    <img src="<?php if($_SESSION['avatar']==null){echo "../assets/img/anime3.jpg";}else{echo $_SESSION['avatar'];}?>" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#quanlitk" class="collapsed">
                        <?php echo $_SESSION['hoten']?>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse in" id="quanlitk">
                        <ul class="nav">
                            <li class="active">
                                <a href="thongtinGV.php">
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
                    <a href="hocvien_lop.php">
                        <i class="material-icons">class</i>
                        <p>Lớp học</p>
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
                    <a class="navbar-brand">Thông tin</a>
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
                                <h4 class="card-title">Thông tin học viên</h4>
                                <form method="post" enctype="multipart/form-data">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Họ tên</label>
                                                <input type="text" class="form-control" value="<?php echo $_SESSION['hoten']?>" id="hoten">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Ngày sinh</label>
                                                <input type="text" class="form-control" value="<?php echo $_SESSION['ngaysinh']?>" id="ngaysinh" ">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Số điện thoại</label>
                                                <input type="text" class="form-control" value="<?php echo $_SESSION['sdt']?>" id="sodienthoai">
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Gmail</label>
                                                <input type="text" class="form-control" value="<?php echo $_SESSION['gmail']?>" id="gmail">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio">
                                                <label class="radio">
                                                    <input type="radio" name="gioitinh" id="nam" value="Nam" <?php if($_SESSION['gioitinh']=="Nam"){ echo "checked";}?>>
                                                    Nam
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gioitinh" id="nu" value="Nữ" <?php if($_SESSION['gioitinh']=="Nữ"){ echo "checked";}?>>
                                                    Nữ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle">
                                                    <img src="<?php echo $_SESSION['avatar']?>">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                <div>
                                                    <span class="btn btn-round btn-primary btn-file">
                                                        <span class="fileinput-new">Chọn ảnh</span>
                                                        <span class="fileinput-exists">Thay đổi</span>
                                                        <input type="file" id="avatar"/>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="pull-left">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#doimatkhau">Đổi mật khẩu</button>
                                    </div>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-rose" onclick="suahocvien()" name="capnhat"">Sửa thông tin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form đổi mật khẩu -->
            <div class="modal fade" id="doimatkhau" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" "><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <span class="modal-title" style="font-size: 18px;color: #e91e63" id="myModalLabel">Đổi mật khẩu</span>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-offset-2">
                                    <div id="checkmatkhaucu" class="form-group label-floating">
                                        <label class="control-label">Mật khẩu cũ</label>
                                        <input type="password" class="form-control" id="matkhaucu">
                                        <code class="hidden" id="loimatkhaucu"></code>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-offset-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Mật khẩu mới</label>
                                        <input type="password" class="form-control" id="matkhaumoi">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-offset-2">
                                    <div id="checkmatkhaumoi" class="form-group label-floating">
                                        <label class="control-label">Xác nhận mật khẩu mới</label>
                                        <input type="password" class="form-control" id="matkhaumoi2">
                                        <code class="hidden" id="loimatkhaumoi"></code>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-rose" onclick="doimk()">Đổi mật khẩu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /Nội Dung -->
        <footer class="footer">
            <div class="container-fluid">
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
    $(document).ready(function () {
        $("#matkhaucu").blur(function () {
            var mk = $(this).val();
            var matkhau = <?php echo $_SESSION['mk']?>;
            if(mk != matkhau){
                document.getElementById("checkmatkhaucu").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loimatkhaucu").setAttribute("class","");
                document.getElementById("loimatkhaucu").innerHTML = "Mật khẩu không đúng";
            }
            else {
                document.getElementById("checkmatkhaucu").setAttribute("class", "form-group label-floating");
                document.getElementById("loimatkhaucu").setAttribute("class", "hidden");
            }
        });
        $("#matkhaumoi2").blur(function () {
            var mk = $(this).val();
            var matkhau = $('#matkhaumoi').val();
            if(mk != matkhau){
                document.getElementById("checkmatkhaumoi").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loimatkhaumoi").setAttribute("class","");
                document.getElementById("loimatkhaumoi").innerHTML = "Mật khẩu không khớp";
            }
            else {
                document.getElementById("checkmatkhaumoi").setAttribute("class", "form-group label-floating");
                document.getElementById("loimatkhaumoi").setAttribute("class", "hidden");
            }
        });
    });
    function doimk() {
        var tk = "<?php echo $_SESSION['tk']?>";
        var matkhau = <?php echo $_SESSION['mk']?>;
        var mk = $('#matkhaucu').val();
        var mkmoi = $('#matkhaumoi').val();
        var mkmoi2 = $('#matkhaumoi2').val();
        if(matkhau != mk){
            document.getElementById("checkmatkhaucu").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loimatkhaucu").setAttribute("class","");
            document.getElementById("loimatkhaucu").innerHTML = "Mật khẩu không đúng";
            document.getElementById("matkhaucu").value = "";
        }
        if(mkmoi != mkmoi2){
            document.getElementById("checkmatkhaumoi").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loimatkhaumoi").setAttribute("class","");
            document.getElementById("loimatkhaumoi").innerHTML = "Mật khẩu không khớp";
            document.getElementById("matkhaumoi2").value = "";
        }
        if(matkhau == mk && mkmoi == mkmoi2){
            $.get("modules/updatedatabase.php",{tk:tk,mk:mkmoi},function () {
                swal({
                    title: "Đổi thành công!",
                    text: "Đã đổi mật khẩu",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    type: "success"
                }).then(function () {
                    window.location.href = "hocvien_lop.php?tk="+tk;
                })
            })
        }
    }
    function suahocvien() {
        var tk = "<?php echo $_SESSION['tk'] ?>";
        var hoten = $("#hoten").val();
        var ngaysinh = $("#ngaysinh").val();
        var sodienthoai = $("#sodienthoai").val();
        var gmail = $("#gmail").val();
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
            $.get("modules/updatedatabase.php",{tkhv:tk,hoten:hoten,ngaysinh:ngaysinh,sdt:sodienthoai,gmail:gmail,gioitinh:gioitinh,avatar:avatar},function () {
                swal({
                    title: 'Sửa thành công!',
                    text: 'Đã sửa thông tin học viên',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).then(function () {
                    window.location.href = "hocvien_lop.php?tk="+tk;
                })
            })
        }else {
            $.get("modules/updatedatabase.php",{tkhv:tk,hoten:hoten,ngaysinh:ngaysinh,sdt:sodienthoai,gmail:gmail,gioitinh:gioitinh,avatar:""},function () {
                swal({
                    title: 'Sửa thành công!',
                    text: 'Đã sửa thông tin học viên',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).then(function () {
                    window.location.href = "hocvien_lop.php?tk="+tk;
                })
            })
        }
    }
</script>
</html>
