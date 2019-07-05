<?php
    ob_start();
    include("modules/kndatabase.php");
    $select = "select * from hocvien";
    $result = mysqli_query($conn,$select)or die("Lỗi truy vấn");
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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
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
                                <a href="admin_lop.php">Các lớp đang mở</a>
                            </li>
                            <li>
                                <a href="admin_lopdong.php">Các lớp đang đóng</a>
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
                <li class="active">
                    <a data-toggle="collapse" href="#quanlihocvien">
                        <i class="material-icons">assignment</i>
                        <p>Quản lí học viên
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse in" id="quanlihocvien">
                        <ul class="nav">
                            <li class="active">
                                <a href="admin_hocvien.php">Danh sách học viên</a>
                            </li>
                            <li>
                                <a href="admin_baonghi.php">Báo nghỉ</a>
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
                    <a class="navbar-brand">Quản lí học viên</a>
                </div>
            </div>
        </nav>
        <!-- Nội Dung -->
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Quản lí học viên</h4>
                            <div class="toolbar">
                                <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#themhocvien" onclick="">
                                    <i class="material-icons">add</i>
                                    Thêm học viên
                                </button>
                            </div>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">Họ tên</th>
                                            <th class="text-primary">Ngày sinh</th>
                                            <th class="text-primary">Giới tính</th>
                                            <th class="text-primary">Học</th>
                                            <th class="text-primary">Nghỉ</th>
                                            <th class="text-primary">Nộp</th>
                                            <th class="text-primary">Chưa nộp</th>
                                            <th class="disabled-sorting text-right text-primary">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while ($row = mysqli_fetch_assoc($result)){ ?>
                                                <tr>
                                                    <td><?php echo $row["hoten"]?></td>
                                                    <td><?php echo $row["ngaysinh"]?></td>
                                                    <td><?php echo $row["gioitinh"]?></td>
                                                    <td><?php echo $row["hoc"]?></td>
                                                    <td><?php echo $row["nghi"]?></td>
                                                    <td><?php $nop = number_format($row["nop"]); echo $nop?> đ</td>
                                                    <td><?php $chuanop = number_format($row["chuanop"]); echo $chuanop?> đ</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#suahocvien" onclick="loadhocvien('<?php echo $row["tk"]?>','<?php echo $row["mk"]?>','<?php echo $row["hoten"]?>','<?php echo $row["ngaysinh"]?>','<?php echo $row["gioitinh"]?>','<?php echo $row["sdt"]?>','<?php echo $row["gmail"]?>','<?php echo $row["giamgia"]?>')">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" class="btn btn-success btn-round" onclick="thanhtoan('<?php echo $row["tk"]?>')">
                                                            <i class="material-icons">add</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
                                            <input type="text" class="form-control datepicker" id="suangaysinh" name="suangaysinh" value=" ">
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
                                    <div class="col-md-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Gmail</label>
                                            <input type="text" class="form-control" id="suagmail" name="suagmail" value="gmail">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Giảm giá(%)</label>
                                            <input type="text" class="form-control" id="suagiamgia" value="giamgia">
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
                                            <input type="text" class="form-control datepicker" value=" " id="ngaysinh" name="ngaysinh">
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
                                    <div class="col-md-5">
                                        <div id="checkgmail" class="form-group label-floating">
                                            <label class="control-label">Gmail</label>
                                            <input type="text" class="form-control" id="gmail" name="gmail">
                                            <code class="hidden" id="loigmail"></code>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Giảm giá(%)</label>
                                            <input type="text" class="form-control" id="giamgia">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-rose" onclick="themhocvien()">Thêm học viên</button>
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
<!-- Select Plugin -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../assets/js/jquery.datatables.js"></script>
<!-- Auto format money -->
<script src="../assets/js/simple.money.format.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Tìm kiếm",
            },

        });
        $('.card .material-datatables label').addClass('form-group');
    });
    function loadhocvien(tk,mk,hoten,ngaysinh,gioitinh,sdt,gmail,giamgia) {
        document.getElementById("suataikhoan").setAttribute("value",tk);
        document.getElementById("suamatkhau").setAttribute("value",mk);
        document.getElementById("suahoten").setAttribute("value",hoten);
        document.getElementById("suangaysinh").setAttribute("value",ngaysinh);
        document.getElementById("suasodienthoai").setAttribute("value",sdt);
        document.getElementById("suagmail").setAttribute("value",gmail);
        document.getElementById("suagiamgia").setAttribute("value",giamgia);
        if(gioitinh==="Nam"){
            document.getElementById("suanam").checked = true;
        }
        else{
            document.getElementById("suanu").checked = true;
        }
    }
    //Thanh toán
    function thanhtoan(tk){
        swal({
            title: 'Nhập thông tin',
            html: '<div class="form-group">' +
                '<input id="tien" type="text" class="form-control text-center" placeholder="Nhập tiền nộp"/>' +
                '</div>' +
                '<div class="form-group">' +
                '<input id="lop" type="text" class="form-control text-center" placeholder="Nhập tên lớp nộp tiền"' +
                '</div>',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function() {
            var tien = $("#tien").val();
            var lop = $("#lop").val();
            $.get("modules/checklop.php",{tkhv:tk,lop:lop},function(result) {
                if(result == 1){
                    if(/^[0-9,]*$/.test(tien)==true){
                        $.get("modules/doanhthu.php",{tkhv:tk,tien:tien,lop:lop});
                        swal({
                            title: 'Thanh toán thành công!',
                            text: 'Đã nộp học phí',
                            type: 'success',
                            confirmButtonClass: "btn btn-success",
                            buttonsStyling: false
                        }).then(function () {
                            location.reload();
                        })
                    }else {
                        swal({
                            title: 'Thanh toán không thành công!',
                            text: 'Số tiền nhập không hợp lệ',
                            type: 'error',
                            confirmButtonClass: "btn btn-success",
                            buttonsStyling: false
                        }).then(function () {
                            location.reload();
                        })
                    }
                }else {
                    swal({
                        title: 'Thanh toán không thành công!',
                        text: 'Học viên không học lớp này',
                        type: 'error',
                        confirmButtonClass: "btn btn-success",
                        buttonsStyling: false
                    }).then(function () {
                        location.reload();
                    })
                }
            });
        });
        $('#tien').simpleMoneyFormat();
    }
    //Thêm học viên
    var checktk = 0;
    $(document).ready(function () {
        $('.datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true
            }
        });
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
        var giamgia = $('#giamgia').val();
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
            $.get("modules/adddatabase.php",{taikhoanhv:tk,matkhau:mk,hoten:hoten,ngaysinh:ngaysinh,sodienthoai:sodienthoai,gmail:gmail,gioitinh:gioitinh,giamgia:giamgia},function () {
                swal({
                    title: 'Đã thêm!',
                    text: 'Thêm thành công học viên',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).then(function () {
                    location.reload();
                })
            });
        }
    }
</script>
</html>


