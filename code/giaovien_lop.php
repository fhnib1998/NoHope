<?php
    ob_start();
    session_start();
    include("modules/kndatabase.php");
    if(isset($_GET["tk"])){
        $taikhoan = $_GET["tk"];
        $sqlSelectGiaoVien = "select * from giaovien where tk = '$taikhoan'";
        $giaovien = mysqli_fetch_row(mysqli_query($conn,$sqlSelectGiaoVien));
        $_SESSION['tk']= $giaovien[0];
        $_SESSION['mk']= $giaovien[1];
        $_SESSION['hoten']= $giaovien[2];
        $_SESSION['ngaysinh']= $giaovien[3];
        $_SESSION['gioitinh']= $giaovien[4];
        $_SESSION['sdt']= $giaovien[5];
        $_SESSION['trinhdo']= $giaovien[6];
        $_SESSION['avatar']= $giaovien[7];
        $_SESSION['lop']= $giaovien[8];
        $_SESSION['quyen'] = "gv";
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
                    <img src="<?php echo $_SESSION['avatar']?>" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#quanlitk" class="collapsed">
                        <?php echo $_SESSION['hoten']?>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="quanlitk">
                        <ul class="nav">
                            <li>
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
                <li class="active">
                    <a href="giaovien_lop.php">
                        <i class="material-icons">class</i>
                        <p>Danh sách lớp dạy</p>
                    </a>
                </li>
                <li>
                    <a href="giaovien_baonghi.php">
                        <i class="material-icons">work_off</i>
                        <p>Báo nghỉ</p>
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
                    <a class="navbar-brand">Danh sách lớp học</a>
                </div>
            </div>
        </nav>
        <!-- Nội Dung -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    $hoten = $_SESSION['hoten'];
                    $sqlSelect = "select * from lop where giaovien = '$hoten'";
                    $result = mysqli_query($conn,$sqlSelect) or die("Lỗi câu truy vấn");
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <b class="material-icons">class</b>
                                    <h4 class="card-title"><?php echo $row["tenlop"];?></h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <th>Lớp</th>
                                            <th><?php echo $row["tenlop"];?></th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Khai giảng</td>
                                                <td><?php echo $row["khaigiang"];?></td>
                                            </tr>
                                            <tr>
                                                <td>Đối tượng</td>
                                                <td><?php echo $row["doituong"];?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <a href="giaovien_chitietlop.php?tenlop=<?php echo $row["tenlop"]?>">
                                                        <button type="button" class="btn btn-rose pull-right">Chi tiết</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
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

</html>


