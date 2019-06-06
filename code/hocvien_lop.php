<?php
    ob_start();
    session_start();
    include("modules/kndatabase.php");
    if(isset($_GET["tk"])) {
        $taikhoan = $_GET["tk"];
        $selectTK = "select * from hocvien where tk = '$taikhoan'";
        $rowHV = mysqli_fetch_row(mysqli_query($conn,$selectTK));
        $_SESSION['tk']= $rowHV[0];
        $_SESSION['mk']= $rowHV[1];
        $_SESSION['hoten']= $rowHV[2];
        $_SESSION['ngaysinh']= $rowHV[3];
        $_SESSION['gioitinh']= $rowHV[4];
        $_SESSION['sdt']= $rowHV[5];
        $_SESSION['gmail']= $rowHV[6];
        $_SESSION['lop']= $rowHV[7];
        $_SESSION['avatar']= $rowHV[29];
        $_SESSION['quyen'] = "hv";
    }
    $taikhoan = $_SESSION['tk'];
    $selectTK = "select * from hocvien where tk = '$taikhoan'";
    $rowHV = mysqli_fetch_row(mysqli_query($conn,$selectTK));
    $tenlop = $_SESSION['lop'];
    $select = "select * from lop where tenlop='$tenlop'";
    $row = mysqli_fetch_row(mysqli_query($conn,$select));
    $selectHocvien = "select * from hocvien where lop='$tenlop'";
    $resultHocvien = mysqli_query($conn,$selectHocvien)or die("Lỗi truy vấn");
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
                    <img src="<?php if($_SESSION['avatar']==null){echo "../assets/img/anime3.jpg";}else{echo $_SESSION['avatar'];} ?>" />
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
                <li class="active">
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
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php while ($rowHocvien = mysqli_fetch_assoc($resultHocvien)){ ?>
                                                            <tr id="<?php echo $rowHocvien["tk"]?>">
                                                                <td><?php echo $rowHocvien["hoten"]?></td>
                                                                <td><?php echo $rowHocvien["ngaysinh"]?></td>
                                                                <td><?php echo $rowHocvien["gioitinh"]?></td>
                                                                <td><?php echo $rowHocvien["sdt"]?></td>
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
                    }
                    if($rowHV[$i+7] == 2){?>
                        {
                            title: '<?php echo "Buổi $i"?>',
                            start: '<?php echo $row[$i + 6]?>',
                            className: 'event-azure',
                            allDay: true
                        },
            <?php
                    }elseif($rowHV[$i+7] == 1){?>
                        {
                            title: '<?php echo "Buổi $i"?>',
                            start: '<?php echo $row[$i + 6]?>',
                            className: 'event-green',
                            allDay: true
                        },
            <?php
                    }else{?>
                        {
                            title: '<?php echo "Buổi $i"?>',
                            start: '<?php echo $row[$i + 6]?>',
                            className: 'event-red',
                            allDay: true
                        },
            <?php
                    }
                }
            }
            ?>
        ]
    });
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


