<?php
    ob_start();
    include("modules/kndatabase.php");
    $lop = $_GET["lop"];
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
                <li class="active">
                    <a data-toggle="collapse" href="#quanlilophoc">
                        <i class="material-icons">class</i>
                        <p>Quản lí lớp học
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse in" id="quanlilophoc">
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
                <li>
                    <a data-toggle="collapse" href="#quanlihocvien">
                        <i class="material-icons">assignment</i>
                        <p>Quản lí học viên
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="quanlihocvien">
                        <ul class="nav">
                            <li>
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
                            <h4 class="card-title">Thêm học viên vào lớp <?php echo $lop?></h4>
                            <div class="toolbar">
                                <button type="button" class="btn btn-primary btn-round" onclick="trolai('<?php echo $lop?>')">
                                    <i class="material-icons">replay</i>
                                    Trở lại lớp
                                </button>
                            </div>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">Họ tên</th>
                                            <th class="text-primary">Ngày sinh</th>
                                            <th class="text-primary">Giới tính</th>
                                            <th class="text-primary">Số điện thoại</th>
                                            <th class="text-primary">Lớp</th>
                                            <th class="disabled-sorting text-right text-primary">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $select = "select * from hocvien where lop not like '%$lop%'";
                                    $result = mysqli_query($conn,$select)or die("Lỗi truy vấn");
                                    while ($row = mysqli_fetch_assoc($result)){ ?>
                                        <tr>
                                            <td><?php echo $row["hoten"]?></td>
                                            <td><?php echo $row["ngaysinh"]?></td>
                                            <td><?php echo $row["gioitinh"]?></td>
                                            <td><?php echo $row["sdt"]?></td>
                                            <td><?php echo $row["lop"]?></td>
                                            <td class="td-actions text-right">
                                                <button type="button" class="btn btn-success btn-round" onclick="themhv('<?php echo $row["tk"]?>','<?php echo $lop?>')">
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
    function themhv(tk,lop){
        $.get("modules/updatedatabase.php",{tkhvl:tk,lop:lop},function () {
            swal({
                title: "Thêm thành công!",
                text: "Đã thêm học viên vào lớp.",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success",
                type: "success"
            }).then(function () {
                location.reload();
            })
        })
    }
    function trolai(lop) {
        window.location.href = "admin_chitietlop.php?tenlop="+lop;
    }
</script>
</html>


