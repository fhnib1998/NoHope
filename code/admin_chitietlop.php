<?php
    ob_start();
    include("modules/kndatabase.php");
    if(isset($_GET["tenlop"])) {
        $tenlop = $_GET["tenlop"];
        $select = "select * from lop where tenlop='$tenlop'";
        $result = mysqli_query($conn,$select);
        $row = mysqli_fetch_row($result) or die("Lỗi truy vấn");
        $selectHocvien = "select * from hocvien where lop='$tenlop'";
        $resultHocvien = mysqli_query($conn,$selectHocvien)or die("Lỗi truy vấn");
        $selectGiaovien = "select * from giaovien";
        $resultGiaovien = mysqli_query($conn,$selectGiaovien)or die("Lỗi truy vấn");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Quản lí lớp</title>
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
    <div class="sidebar" data-active-color="blue" data-background-color="black" data-image="../assets/img/sidebar-5.jpg">
        <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
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
                    <a href="dashboard.html">
                        <i class="material-icons">home</i>
                        <p>Trang chủ</p>
                    </a>
                </li>
                <li class="active">
                    <a data-toggle="collapse" href="#quanlilophoc">
                        <i class="material-icons">class</i>
                        <p>Quản lí lớp học
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse in" id="quanlilophoc">
                        <ul class="nav">
                            <li class="active">
                                <a href="admin_lop.php">Danh sách lớp học</a>
                            </li>
                            <li>
                                <a href="admin_addlop.php">Thêm lớp học</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#quanligiaovien">
                        <i class="material-icons">school</i>
                        <p>Quản lí giáo viên
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="quanligiaovien">
                        <ul class="nav">
                            <li>
                                <a href="admin_giaovien.php">Danh sách giáo viên</a>
                            </li>
                            <li>
                                <a href="admin_addgiaovien.php">Thêm giáo viên</a>
                            </li>
                        </ul>
                    </div>
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
                    <a class="navbar-brand">Danh sách lớp học</a>
                </div>
            </div>
        </nav>
        <!-- Nội Dung -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="rose">
                                <i class="material-icons">class</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Thông tin lớp <?php echo $row[0] ?></h4>
                                <div class="row">
                                    <div class="col-md-2">
                                        <ul class="nav nav-pills nav-pills-icons nav-pills-rose nav-stacked" role="tablist">
                                            <li id="tabthongtin">
                                                <a href="#thongtin" role="tab" data-toggle="tab">
                                                    <i class="material-icons">info</i> Thông tin
                                                </a>
                                            </li>
                                            <li id="tablichhoc" class="active">
                                                <a href="#lichhoc" role="tab" data-toggle="tab">
                                                    <i class="material-icons">event</i> Lịch học
                                                </a>
                                            </li>
                                            <li id="tabhocvien">
                                                <a href="#hocvien" role="tab" data-toggle="tab">
                                                    <i class="material-icons">person</i> Học viên
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-8 col-md-offset-1">
                                        <div class="tab-content">
                                            <div class="tab-pane" id="thongtin">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="text-primary">
                                                        <th>Lớp</th>
                                                        <th><?php echo $row[0]?></th>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Khai giảng</td>
                                                            <td><?php echo $row[3]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Giáo viên</td>
                                                            <td><?php echo $row[1]?></td>
                                                        <tr>
                                                            <td>Phòng học</td>
                                                            <td><?php echo $row[2]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ca học</td>
                                                            <td><?php echo $row[6]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Đối tượng</td>
                                                            <td><?php echo $row[4]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sĩ số</td>
                                                            <td><?php echo $row[5]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <button type="button" class="btn btn-rose pull-right" data-toggle="modal" data-target="#sualop" onclick="loadlop('<?php echo $row[0]?>','<?php echo $row[3]?>','<?php echo $row[4]?>','<?php echo $row[2]?>','<?php echo $row[6]?>','<?php echo $row[1]?>')">Chỉnh sửa</button>
                                                                <button type="button" class="btn btn-primary" onclick="xoalop('<?php echo $row[0]?>')">Xóa lớp</button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane active" id="lichhoc">
                                                <div class="card card-calendar">
                                                    <div class="card-content" class="ps-child">
                                                        <div id="fullCalendar"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="hocvien">
                                                <div class="table-responsive">
                                                    <table id="tablehocvien" class="table">
                                                        <thead class="text-primary">
                                                        <tr>
                                                            <th>Họ tên</th>
                                                            <th>Ngày sinh</th>
                                                            <th>Giới tính</th>
                                                            <th>Số điện thoại</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php while ($rowHocvien = mysqli_fetch_assoc($resultHocvien)){ ?>
                                                            <tr id="<?php echo $rowHocvien["tk"]?>">
                                                                <td><?php echo $rowHocvien["hoten"]?></td>
                                                                <td><?php echo $rowHocvien["ngaysinh"]?></td>
                                                                <td><?php echo $rowHocvien["gioitinh"]?></td>
                                                                <td><?php echo $rowHocvien["sdt"]?></td>
                                                                <td class="td-actions">
                                                                    <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#suahocvien" onclick="loadhocvien('<?php echo $rowHocvien["tk"]?>','<?php echo $rowHocvien["mk"]?>','<?php echo $rowHocvien["hoten"]?>','<?php echo $rowHocvien["ngaysinh"]?>','<?php echo $rowHocvien["gioitinh"]?>','<?php echo $rowHocvien["sdt"]?>','<?php echo $rowHocvien["gmail"]?>')">
                                                                        <i class="material-icons">edit</i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-success btn-round" onclick="xacnhanxoa('<?php echo $rowHocvien["tk"]?>')">
                                                                        <i class="material-icons">close</i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        } ?>
                                                        </tbody>
                                                    </table>
                                                    <button type="button" class="btn btn-rose pull-right" data-toggle="modal" data-target="#themhocvien">Thêm học viên</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form thêm học viên -->
            <div class="modal fade" id="themhocvien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" "><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <span class="modal-title" style="font-size: 18px;color: #e91e63" id="myModalLabel">Thêm học viên</span>
                        </div>
                        <div class="modal-body">
                            <form id="formthemhocvien" method="post">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="checktaikhoan" class="form-group label-floating">
                                            <label class="control-label">Tài khoản</label>
                                            <input type="text" class="form-control" id="taikhoan" name="taikhoan">
                                            <code class="hidden" id="loitaikhoan"></code>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div id="checkmatkhau" class="form-group label-floating">
                                            <label class="control-label">Mật khẩu</label>
                                            <input type="password" class="form-control" id="matkhau" name="matkhau">
                                            <code class="hidden" id="loimatkhau"></code>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="checkhoten" class="form-group label-floating">
                                            <label class="control-label">Họ tên</label>
                                            <input type="text" class="form-control" id="hoten" name="hoten">
                                            <code class="hidden" id="loihoten"></code>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="checkngaysinh" class="form-group label-floating">
                                            <label class="control-label">Ngày sinh</label>
                                            <input type="text" class="form-control" id="ngaysinh" name="ngaysinh">
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
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div id="checkgmail" class="form-group label-floating">
                                            <label class="control-label">Gmail</label>
                                            <input type="text" class="form-control" id="gmail" name="gmail">
                                            <code class="hidden" id="loigmail"></code>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio" >
                                            <label>
                                                <input type="radio" name="gioitinh" id="nam" value="Nam">
                                                Nam
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gioitinh" id="nu" value="Nữ">
                                                Nữ
                                            </label>
                                        </div>
                                        <code class="hidden" id="loigioitinh"></code>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Lớp</label>
                                            <input type="text" class="form-control" id="lop" name="lop" value="<?php echo $row[0];?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-rose" data-dismiss="modal" onclick="themhocvien()">Thêm học viên</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form sửa lớp học -->
            <div class="modal fade" id="sualop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <span class="modal-title" style="font-size: 18px;color: #e91e63" id="myModalLabel">Sửa thông tin lớp học</span>
                        </div>
                        <div class="modal-body">
                            <form id="formsualop" method="post">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tên lớp</label>
                                            <input type="text" class="form-control" id="suatenlop" value="Tên lớp" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Khai giảng</label>
                                            <input type="text" class="form-control datepicker" id="suakhaigiang" value="03/12/1998">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Đối tượng</label>
                                            <input type="text" class="form-control" id="suadoituong" value="Đối tượng học">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Phòng học</label>
                                            <input type="text" class="form-control" id="suaphonghoc" value="Phòng học">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Ca học</label>
                                            <input type="text" class="form-control" id="suacahoc" value="Ca học">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <select id="suagiaovien" class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select">
                                            <option disabled selected>Chọn giáo viên</option>
                                            <?php
                                            while ($rowGiaovien = mysqli_fetch_assoc($resultGiaovien)){?>
                                                <option><?php echo $rowGiaovien["hoten"]?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-rose" data-dismiss="modal" onclick="sualop()">Sửa lớp học</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form sửa học viên -->
            <div class="modal fade" id="suahocvien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <span class="modal-title" style="font-size: 18px;color: #e91e63" id="myModalLabel">Sửa thông tin học viên</span>
                        </div>
                        <div class="modal-body">
                            <form id="formsuahocvien" method="post">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tài khoản</label>
                                            <input type="text" class="form-control" id="suataikhoan" name="suataikhoan" value="tk" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Mật khẩu</label>
                                            <input type="password" class="form-control" id="suamatkhau" name="suamatkhau" value="mk">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Họ tên</label>
                                            <input type="text" class="form-control" id="suahoten" name="suahoten" value="ht">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Ngày sinh</label>
                                            <input type="text" class="form-control" id="suangaysinh" name="suangaysinh" value="ns">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Số điện thoại</label>
                                            <input type="text" class="form-control" id="suasodienthoai" name="suasodienthoai" value="sdt">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Gmail</label>
                                            <input type="text" class="form-control" id="suagmail" name="suagmail" value="gmail">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio" >
                                            <label>
                                                <input type="radio" name="gioitinh" id="suanam" value="Nam">
                                                Nam
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gioitinh" id="suanu" value="Nữ">
                                                Nữ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Lớp</label>
                                            <input type="text" class="form-control" id="sualop" name="sualop" value="<?php echo $row[0];?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-rose" data-dismiss="modal" onclick="suahocvien()">Sửa học viên</button>
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
<!-- Forms Validations Plugin -->
<script src="../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script type="text/javascript">
    //Lịch
    $calendar = $('#fullCalendar');

    today = new Date();
    y = today.getFullYear();
    m = today.getMonth();
    d = today.getDate();

    $calendar.fullCalendar({
        viewRender: function(view, element) {
            // We make sure that we activate the perfect scrollbar when the view isn't on Month
            if (view.name != 'month'){
                $(element).find('.fc-scroller').perfectScrollbar();
            }
        },
        header: {
            left: 'title',
            right: 'prev,next,today'
        },
        defaultDate: today,
        selectable: true,
        selectHelper: true,
        views: {
            month: { // name of view
                titleFormat: 'MMMM YYYY'
                // other view-specific options here
            }
        },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        select: function(start, end) {
            // on select we show the Sweet Alert modal with an input
            var lop = "<?php echo $row[0]?>";
            var lichhoc = start.format("dddd MM/DD/YYYY");
            swal({
                title:lichhoc,
                html: '<div class="form-group">' +
                    '<input class="form-control" placeholder="Nhập buổi học" id="input-field">' +
                    '</div>',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                var eventData;
                    title = $('#input-field').val();
                    titlec = title.toUpperCase();
                if (titlec==="BUỔI 1"||titlec==="BUỔI 2"||titlec==="BUỔI 3"||titlec==="BUỔI 4"||titlec==="BUỔI 5"||titlec==="BUỔI 6"||titlec==="BUỔI 7"||titlec==="BUỔI 8"||titlec==="BUỔI 9"||titlec==="BUỔI 10"||titlec==="BUỔI 11"||titlec==="BUỔI 12"||titlec==="BUỔI 13"||titlec==="BUỔI 14"||titlec==="BUỔI 15"||titlec==="BUỔI 16"||titlec==="BUỔI 17"||titlec==="BUỔI 18"||titlec==="BUỔI 19"||titlec==="BUỔI 20") {
                    eventData = {
                        title: title,
                        start: start,
                        end: end
                    };
                    $calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
                    $.get("modules/lichhoc.php?title="+title.toUpperCase()+"&start="+lichhoc+"&lop="+lop);
                }
                $calendar.fullCalendar('unselect');
            });
        },
        eventResize:function(event){
            var start = event.start;
            var lichhoc = start.format("dddd MM/DD/YYYY");
            var title = event.title;
            var lop = "<?php echo $row[0]?>";
            $.get("modules/lichhoc.php?start="+lichhoc+"&title="+title.toUpperCase()+"&lop="+lop);
        },
        eventDrop:function(event){
            var start = event.start;
            var lichhoc = start.format("dddd MM/DD/YYYY");
            var title = event.title;
            var lop = "<?php echo $row[0]?>";
            $.get("modules/lichhoc.php?start="+lichhoc+"&title="+title.toUpperCase()+"&lop="+lop);
        },
        // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
        events: [
            <?php
                if($row[7]==null){?>
            {
                title: 'Khai giảng',
                start: '<?php echo $row[3]?>',
                className: 'event-azure',
                allDay: true
            },
            <?php
                }
                else{
            for($i = 1;$i <= 20;$i++){
                if($row[$i+6]==null){
                    $row[$i+6]="03/12/1998";
                }?>
            {
                title: '<?php echo "Buổi $i"?>',
                start: '<?php echo $row[$i + 6]?>',
                className: 'event-azure',
                allDay: true
            },
            <?php
            }
            }
            ?>
        ]
    });
    //Thêm học viên
    var checktk = 0;
    $(document).ready(function () {
        demo.initFormExtendedDatetimepickers();
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
    function themhocvien() {
        var tk = $("#taikhoan").val();
        var mk = $("#matkhau").val();
        var hoten = $("#hoten").val();
        var ngaysinh = $("#ngaysinh").val();
        var sodienthoai = $("#sodienthoai").val();
        var gmail = $("#gmail").val();
        var lop = $("#lop").val();
        var gioitinh;
        if(document.getElementById("nam").checked){
            gioitinh = "Nam";
        }
        else if(document.getElementById("nu").checked){
            gioitinh = "Nữ";
        }
        else {
            gioitinh = "BD";
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
            $.get("modules/adddatabase.php",{taikhoanhv:tk,matkhau:mk,hoten:hoten,ngaysinh:ngaysinh,sodienthoai:sodienthoai,gmail:gmail,gioitinh:gioitinh,lop:lop},function () {
                swal({
                    title: 'Đã thêm!',
                    text: 'Thêm thành công học viên',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).then(function () {
                    var tkhv="'"+tk+"'";
                    var thongtin = "'"+tk+"',"+"'"+mk+"',"+"'"+hoten+"',"+"'"+ngaysinh+"',"+"'"+gioitinh+"',"+"'"+sodienthoai+"',"+"'"+gmail+"'";
                    var row = '<tr id="'+tk+'"><td>'+hoten+'</td><td>'+ngaysinh+'</td><td>'+gioitinh+'</td><td>'+sodienthoai+'</td><td class="td-actions"><button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#suahocvien" onclick="loadhocvien('+thongtin+')"><i class="material-icons">edit</i></button><button type="button" rel="tooltip" class="btn btn-success btn-round" onclick="xacnhanxoa('+tkhv+')"><i class="material-icons">close</i></button></td></tr>';
                    $("#tablehocvien").append(row);
                    $("#formthemhocvien")[0].reset();
                })
            });
        }
    }
    function loadhocvien(tk,mk,hoten,ngaysinh,gioitinh,sdt,gmail) {
        document.getElementById("suataikhoan").setAttribute("value",tk);
        document.getElementById("suamatkhau").setAttribute("value",mk);
        document.getElementById("suahoten").setAttribute("value",hoten);
        document.getElementById("suangaysinh").setAttribute("value",ngaysinh);
        document.getElementById("suasodienthoai").setAttribute("value",sdt);
        document.getElementById("suagmail").setAttribute("value",gmail);
        if(gioitinh==="Nam"){
            document.getElementById("suanam").checked = true;
        }
        else{
            document.getElementById("suanu").checked = true;
        }
    }
    function loadlop(tenlop,khaigiang,doituong,phonghoc,cahoc) {
        document.getElementById("suatenlop").setAttribute("value",tenlop);
        document.getElementById("suakhaigiang").setAttribute("value",khaigiang);
        document.getElementById("suadoituong").setAttribute("value",doituong);
        document.getElementById("suaphonghoc").setAttribute("value",phonghoc);
        document.getElementById("suacahoc").setAttribute("value",cahoc);
    }
    function suahocvien() {
        var tk = $("#suataikhoan").val();
        var mk = $("#suamatkhau").val();
        var hoten = $("#suahoten").val();
        var ngaysinh = $("#suangaysinh").val();
        var sodienthoai = $("#suasodienthoai").val();
        var gmail = $("#suagmail").val();
        var gioitinh;
        if(document.getElementById("suanam").checked){
            gioitinh = "Nam";
        }
        else if(document.getElementById("suanu").checked){
            gioitinh = "Nữ";
        }
        else {
            gioitinh = "BD";
        }
        $.get("modules/updatedatabase.php",{tkhvad:tk,mk:mk,hoten:hoten,ngaysinh:ngaysinh,gioitinh:gioitinh,sdt:sodienthoai,gmail:gmail},function () {
            swal({
                title: 'Đã sửa!',
                text: 'Sửa thành công học viên',
                type: 'success',
                confirmButtonClass: "btn btn-success",
                buttonsStyling: false
            }).then(function () {
                var tkhv="'"+tk+"'";
                var thongtin = "'"+tk+"',"+"'"+mk+"',"+"'"+hoten+"',"+"'"+ngaysinh+"',"+"'"+gioitinh+"',"+"'"+sodienthoai+"',"+"'"+gmail+"'";
                var row = '<tr id="'+tk+'"><td>'+hoten+'</td><td>'+ngaysinh+'</td><td>'+gioitinh+'</td><td>'+sodienthoai+'</td><td class="td-actions"><button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#suahocvien" onclick="loadhocvien('+thongtin+')"><i class="material-icons">edit</i></button><button type="button" rel="tooltip" class="btn btn-success btn-round" onclick="xacnhanxoa('+tkhv+')"><i class="material-icons">close</i></button></td></tr>';
                var child = document.getElementById(tk);
                child.parentNode.removeChild(child);
                $("#tablehocvien").append(row);
            })
        })
    }
    function sualop() {
        var tenlop = $("#suatenlop").val();
        var khaigiang = $("#suakhaigiang").val();
        var doituong = $("#suadoituong").val();
        var phonghoc = $("#suaphonghoc").val();
        var cahoc = $("#suacahoc").val();
        var giaovien = $("#suagiaovien").val();
        $.get("modules/updatedatabase.php",{tenlop:tenlop,khaigiang:khaigiang,doituong:doituong,phonghoc:phonghoc,cahoc:cahoc,giaovien:giaovien},function () {
            swal({
                title: 'Đã sửa!',
                text: 'Sửa thành công lớp học',
                type: 'success',
                confirmButtonClass: "btn btn-success",
                buttonsStyling: false
            }).then(function () {
                location.reload();
            })
        })
    }
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
                $.get("modules/deldatabase.php?tkhv="+tk,function () {
                    var child = document.getElementById(tk);
                    child.parentNode.removeChild(child);
                });
            })
        })
    }
    function xoalop(tenlop) {
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
                $.get("modules/deldatabase.php?tenlop="+tenlop,function () {
                    window.location.href = "admin_lop.php";
                });
            })
        })
    }
</script>
<style type="text/css">
    .card-calendar table td{
        text-align: center;
    }
    .fc-event{
        font-size: 12px;
        line-height: 1.5;
    }
    .fc-unthemed .fc-today{
        background: #a7ffeb;
    }
</style>
</html>


