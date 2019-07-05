<?php
    ob_start();
    session_start();
    include("modules/kndatabase.php");
    if(isset($_GET['tk'])){
        $_SESSION['tk'] = $_GET['tk'];
        $_SESSION['quyen'] = "admin";
    }
    if(isset($_POST["tenlop"])){
        header("Location: admin_lop.php?tenlop=".$_POST["tenlop"]);
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
                            <li class="active">
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
                    <a class="navbar-brand">Danh sách lớp học</a>
                </div>
                <form class="navbar-form navbar-right" style="margin-right: 80px">
                    <div class="form-group form-search is-empty">
                        <input name="tenlop" type="text" class="form-control" placeholder="Nhập tên lớp">
                    </div>
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                    </button>
                </form>
                <form class="navbar-form navbar-right" style="margin-right: 40px">
                    <div class="form-group">
                        <input id="ngay" type="text" class="form-control datepicker" placeholder="Chọn ngày">
                    </div>
                    <button type="button" class="btn btn-white btn-round btn-just-icon" onclick="loclopngay()">
                        <i class="material-icons">search</i>
                    </button>
                </form>
            </div>
        </nav>

        <!-- Nội Dung -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if(isset($_GET["tenlop"])){
                        $tenlop = $_GET["tenlop"];
                        $sqlSelect = "select tenlop,khaigiang,doituong from lop where tenlop like '%$tenlop%' and dong = 0";
                        $result = mysqli_query($conn, $sqlSelect);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <b class="material-icons">class</b>
                                    <h4 class="card-title"><?php echo $row["tenlop"]; ?></h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <th>Lớp</th>
                                            <th><?php echo $row["tenlop"]; ?></th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Khai giảng</td>
                                                <td><?php echo $row["khaigiang"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Đối tượng</td>
                                                <td><?php echo $row["doituong"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <a href="admin_chitietlop.php?tenlop=<?php echo $row["tenlop"] ?>">
                                                        <button type="button" class="btn btn-rose pull-right">Chi tiết
                                                        </button>
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
                    }else if(isset($_GET["ngay"])){
                        $ngay = $_GET["ngay"];
                        $sqlSelect = "select lop from lichhoc where ngay = '$ngay'";
                        $result = mysqli_query($conn,$sqlSelect);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $lop = $row["lop"];
                            $sqlSelectL = "select tenlop,khaigiang,doituong,dong from lop where tenlop = '$lop'";
                            $resultL = mysqli_query($conn,$sqlSelectL);
                            $rowL = mysqli_fetch_row($resultL);
                            if($rowL[3] == 0) {
                                ?>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header card-header-icon" data-background-color="rose">
                                            <b class="material-icons">class</b>
                                            <h4 class="card-title"><?php echo $rowL[0]; ?></h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="text-primary">
                                                    <th>Lớp</th>
                                                    <th><?php echo $rowL[0]; ?></th>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Khai giảng</td>
                                                        <td><?php echo $rowL[1]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Đối tượng</td>
                                                        <td><?php echo $rowL[2]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <a href="admin_chitietlop.php?tenlop=<?php echo $rowL[0] ?>">
                                                                <button type="button" class="btn btn-rose pull-right">
                                                                    Chi tiết
                                                                </button>
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
                        }
                    }else{
                        $sqlSelect = "select tenlop,khaigiang,doituong from lop where dong = 0";
                        $result = mysqli_query($conn,$sqlSelect);
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
                                                        <a href="admin_chitietlop.php?tenlop=<?php echo $row["tenlop"]?>">
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
<script>
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
    })
    function loclopngay() {
        var ngay = $('#ngay').val();
        window.location.href = "admin_lop.php?ngay="+ngay;
    }
</script>

</html>

