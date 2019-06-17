<?php
    ob_start();
    session_start();
    include("modules/kndatabase.php");
    $taikhoan = $_SESSION['tk'];
    $selectTK = "select tk from hocvien where tk = '$taikhoan'";
    $rowHV = mysqli_fetch_row(mysqli_query($conn,$selectTK));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Lớp học</title>
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
                    <img src="<?php if($_SESSION['avatar']==null){echo "../assets/img/logo.png";}else{echo $_SESSION['avatar'];} ?>" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#quanlitk" class="collapsed">
                        <?php echo $_SESSION['hoten']?>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="quanlitk">
                        <ul class="nav">
                            <li>
                                <a href="thongtinHV.php">
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
                <li class="active">
                    <a href="hocvien_thanhtoan.php">
                        <i class="material-icons">style</i>
                        <p>Thanh toán online</p>
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
                    <a class="navbar-brand">Thanh toán online</a>
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
                                <i class="material-icons">style</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Thanh toán online</h4>
                                <br>
                                <div class="row col-md-8 col-md-offset-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tên chủ tài khoản</label>
                                        <input type="text" class="form-control" id="tenchutk" value="HOÀNG THANH BÌNH" disabled>
                                    </div>
                                    <br>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Số tài khoản</label>
                                        <input type="text" class="form-control" id="sotk" value="12031998" disabled>
                                    </div>
                                    <br>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Số tiền</label>
                                        <input type="text" class="form-control" id="tien">
                                    </div>
                                    <br>
                                    <select class="selectpicker col-md-6" data-style="btn btn-primary btn-round" title="Single Select">
                                        <option disabled selected>Chọn ngân hàng</option>
                                        <option>MB Bank</option>
                                        <option>Vietcombank</option>
                                        <option>Vietinbank</option>
                                        <option>TP Bank</option>
                                        <option>BIDV</option>
                                    </select>
                                    <br>
                                </div>
                                <button type="button" class="btn btn-rose pull-right" onclick="thanhtoan()">Thanh toán</button>
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
<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>
<!-- Select Plugin -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../assets/js/fullcalendar.min.js"></script>
<!--	Plugin for Fileupload -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script type="text/javascript">
    //Thanh toán
    function thanhtoan(){
        var tien = $("#tien").val();
        var tk = "<?php echo $rowHV[0]?>";
        $.get("modules/doanhthu.php",{tkhv:tk,tien:tien});
        swal({
            title: 'Thanh toán thành công!',
            text: 'Đã nộp học phí',
            type: 'success',
            confirmButtonClass: "btn btn-success",
            buttonsStyling: false
        }).then(function () {
            location.reload();
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


