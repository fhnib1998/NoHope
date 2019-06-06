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
                        <?php
                        $sqlSelect = "select * from giaovien";
                        $result = mysqli_query($conn,$sqlSelect) or die("Lỗi câu truy vấn");
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col-md-4">
                                <div class="card card-product">
                                    <div class="card-image" data-header-animation="true">
                                        <img class="img" src= <?php echo $row["avatar"];?>>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-actions">
                                            <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                                <i class="material-icons">build</i> Khôi phục ảnh
                                            </button>
                                            <button type="button" class="btn btn-default btn-simple" data-placement="bottom" data-toggle="modal" data-target="#thongtin<?php echo $row["tk"]?>" title="Chi tiết">
                                                <i class="material-icons">art_track</i>
                                            </button>
                                            <a href="admin_suagiaovien.php?tk=<?php echo $row["tk"];?>">
                                                <button type="button" class="btn btn-success btn-simple" data-placement="bottom" title="Chỉnh sửa">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-simple" data-placement="bottom" title="Xóa" onclick="xacnhanxoa('<?php echo $row["tk"] ?>')">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </div>
                                        <h3 class="card-title">
                                            <?php echo $row["hoten"]; ?>
                                        </h3>
                                        <h4 class="card-description">
                                            Ngày sinh: <?php echo $row["ngaysinh"];?><br>
                                            Giới tính: <?php echo $row["gioitinh"];?><br>
                                            SĐT: <?php echo $row["sdt"];?><br>
                                            Trình độ: <?php echo $row["trinhdo"];?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="thongtin<?php echo $row["tk"]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" "><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <span class="modal-title" style="font-size: 18px;color: #e91e63" id="myModalLabel">Thông tin giáo viên</span>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="text-primary">
                                                    <th>Họ tên</th>
                                                    <th><?php echo $row["hoten"]?></th>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Ngày sinh</td>
                                                        <td><?php echo $row["ngaysinh"]?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Giới tính</td>
                                                        <td><?php echo $row["gioitinh"]?></td>
                                                    <tr>
                                                        <td>Số điện thoại</td>
                                                        <td><?php echo $row["sdt"]?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Trình độ</td>
                                                        <td><?php echo $row["trinhdo"]?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lớp đang dạy</td>
                                                        <td><?php echo $row["lop"]?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-rose" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
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
            $.get("modules/deldatabase.php",{tkgv:tk},function () {
                swal({
                    title: 'Đã xóa!',
                    text: 'Mất tiêu luôn.',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).then(function () {
                    location.reload();
                })
            });
        })
    }
</script>
</html>
