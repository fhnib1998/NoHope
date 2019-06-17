<?php
    ob_start();
    session_start();
    include("modules/kndatabase.php");
    if(isset($_GET['tk'])){
        $_SESSION['tk'] = $_GET['tk'];
        $_SESSION['quyen'] = "admin";
    }
    if(isset($_GET["nam"])){
        $nam = $_GET["nam"];
    }else{
        $nam = date("Y");
    }
    if(isset($_POST["nam"])){
        header("Location: admin_doanhthu.php?nam=".$_POST["nam"]);
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
                    <a href="admin_editweb.php">
                        <i class="material-icons">dashboard</i>
                        <p>Quảng cáo khóa học</p>
                    </a>
                </li>
                <li class="active">
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
                    <a class="navbar-brand">Danh sách lớp học</a>
                </div>
                <form class="navbar-form navbar-right" style="margin-right: 100px">
                    <div class="form-group form-search is-empty">
                        <input name="nam" type="text" class="form-control" placeholder="Nhập năm">
                    </div>
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                    </button>
                </form>
            </div>
        </nav>

        <!-- Nội Dung -->
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <b class="material-icons">toys</b>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Doanh thu năm <?php echo $nam?></h4>
                            <div class="table-responsive">
                                <table id="tablehocvien" class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th class="text-center">Tháng</th>
                                        <th class="text-center">Thu</th>
                                        <th class="text-center">Chi</th>
                                        <th class="text-center">Doanh thu</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sqlSelect = "select * from doanhthu where thang like '%$nam%'";
                                    $result = mysqli_query($conn,$sqlSelect);
                                    while ($row = mysqli_fetch_assoc($result)){ ?>
                                        <tr>
                                            <td class="text-center"><?php echo substr($row["thang"],0,2)?></td>
                                            <td class="text-center"><?php echo $row["thu"]?>đ</td>
                                            <td class="text-center"><?php echo $row["chi"]?>đ</td>
                                            <td class="text-center"><?php echo $row["thu"]-$row["chi"]?>đ</td>
                                            <td class="td-actions">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#<?php echo substr($row["thang"],0,2)?>">
                                                    Chi tiết
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form chi tiết doanh thu -->
            <?php
            $sqlSelect = "select * from doanhthu where thang like '%$nam%'";
            $result = mysqli_query($conn,$sqlSelect);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="modal fade" id="<?php echo substr($row["thang"],0,2)?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                        class="sr-only">Close</span></button>
                                <span class="modal-title" style="font-size: 18px;color: #e91e63" id="myModalLabel">Chi tiết doanh thu tháng <?php echo $row["thang"]?></span>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tablehocvien" class="table">
                                            <thead class="text-primary">
                                            <tr>
                                                <th>Ngày</th>
                                                <th>Nội dung</th>
                                                <th>Số tiền</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $thang = $row["thang"];
                                            $sqlSelectCT = "select * from thongke where thang = '$thang'";
                                            $resultCT = mysqli_query($conn,$sqlSelectCT);
                                            while ($rowCT = mysqli_fetch_assoc($resultCT)){ ?>
                                                <tr>
                                                    <td><?php echo $rowCT["ngay"]?></td>
                                                    <td><?php echo $rowCT["noidung"]?></td>
                                                    <td><?php echo $rowCT["tien"]?>đ</td>
                                                </tr>
                                                <?php
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
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

