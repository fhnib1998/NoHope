<?php
    ob_start();
    include("modules/kndatabase.php");
    if(isset($_GET["tenlop"])) {
        $tenlop = $_GET["tenlop"];
        $select = "select * from lop where tenlop='$tenlop'";
        $result = mysqli_query($conn,$select);
        $row = mysqli_fetch_row($result) or die("Lỗi truy vấn");
        $selectHocvien = "select * from hocvien where lop like '%$tenlop%'";
        $resultHocvien = mysqli_query($conn,$selectHocvien)or die("Lỗi truy vấn HV");
        $selectGiaovien = "select hoten from giaovien";
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
                                                <a href="#tthongtin" role="tab" data-toggle="tab">
                                                    <i class="material-icons">info</i> Thông tin
                                                </a>
                                            </li>
                                            <li id="tablichhoc" class="active">
                                                <a href="#tlichhoc" role="tab" data-toggle="tab">
                                                    <i class="material-icons">event</i> Lịch học
                                                </a>
                                            </li>
                                            <li id="tabhocvien">
                                                <a href="#thocvien" role="tab" data-toggle="tab">
                                                    <i class="material-icons">person</i> Học viên
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-8 col-md-offset-1">
                                        <div class="tab-content">
                                            <div class="tab-pane" id="tthongtin">
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
                                                            <td>Học phí</td>
                                                            <td><?php $hocphi = number_format($row[7]); echo $hocphi?>đ</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lương giáo viên</td>
                                                            <td><?php $luong = number_format($row[8]); echo $luong?>đ</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sĩ số</td>
                                                            <td><?php echo $row[5]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <button type="button" class="btn btn-rose pull-right" data-toggle="modal" data-target="#sualop">Chỉnh sửa</button>
                                                                <button type="button" class="btn btn-danger" onclick="donglop('<?php echo $row[0]?>')">Đóng lớp</button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane active" id="tlichhoc">
                                                <div class="card card-calendar">
                                                    <div class="card-content" class="ps-child">
                                                        <div id="fullCalendar"></div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-rose pull-right" data-toggle="modal" data-target="#taolich">Tạo lịch</button>
                                            </div>
                                            <div class="tab-pane" id="thocvien">
                                                <div class="table-responsive">
                                                    <table id="tablehocvien" class="table">
                                                        <thead class="text-primary">
                                                        <tr>
                                                            <th class="text-center">Họ tên</th>
                                                            <th class="text-center">Đã học</th>
                                                            <th class="text-center">Nghỉ</th>
                                                            <th class="text-center">Đã đóng</th>
                                                            <th class="text-center">Chưa đóng</th>
                                                            <th class="text-right"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php while ($rowHocvien = mysqli_fetch_assoc($resultHocvien)){
                                                            $tkHL = $rowHocvien["tk"];
                                                            $sqlSelectHL = "select * from hocvienlop where lop='$tenlop' and tk='$tkHL'";
                                                            $resultHL = mysqli_query($conn,$sqlSelectHL);
                                                            $rowHL = mysqli_fetch_row($resultHL);
                                                            ?>
                                                            <tr id="<?php echo $rowHocvien["tk"]?>">
                                                                <td class="text-center"><?php echo $rowHocvien["hoten"]?></td>
                                                                <td class="text-center"><?php if($rowHL[2] == null){echo "0";}else{echo $rowHL[2];}?> buổi</td>
                                                                <td class="text-center"><?php if($rowHL[3] == null){echo "0";}else{echo $rowHL[3];}?> buổi</td>
                                                                <td class="text-center"><?php $nop = number_format($rowHL[5]); echo $nop?> đ</td>
                                                                <td class="text-center"><?php $chuanop = number_format($rowHL[4]); echo $chuanop?> đ</td>
                                                                <td class="td-actions text-right">
                                                                    <button type="button" class="btn btn-warning btn-round" onclick="xacnhanxoa('<?php echo $rowHocvien["tk"]?>','<?php echo $tenlop?>')">
                                                                        <i class="material-icons">close</i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        } ?>
                                                        </tbody>
                                                    </table>
                                                    <button type="button" class="btn btn-rose pull-right" onclick="themhocvien('<?php echo $tenlop?>')">Thêm học viên</button>
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
                                    <div class="col-sm-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tên lớp</label>
                                            <input type="text" class="form-control" id="suatenlop" value="<?php echo $row[0]?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Khai giảng</label>
                                            <input type="text" class="form-control datepicker" id="suakhaigiang" value="<?php echo $row[3]?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Đối tượng</label>
                                            <input type="text" class="form-control" id="suadoituong" value="<?php echo $row[4]?>">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Phòng học</label>
                                            <input type="text" class="form-control" id="suaphonghoc" value="<?php echo $row[2]?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Học phí</label>
                                            <input type="text" class="form-control" id="suahocphi" value="<?php echo $row[7]?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Lương giáo viên</label>
                                            <input type="text" class="form-control" id="sualuong" value="<?php echo $row[8]?>">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Ca học</label>
                                            <input type="text" class="form-control" id="suacahoc" value="<?php echo $row[6]?>">
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
            <!-- Form tạo lịch học -->
            <div class="modal fade" id="taolich" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <span class="modal-title" style="font-size: 18px;color: #e91e63" id="myModalLabel">Tạo lịch học lớp <?php echo $row[0]?></span>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Bắt đầu</label>
                                        <input type="text" class="form-control datepicker" id="ngaybatdau" value=" ">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Kết thúc</label>
                                        <input type="text" class="form-control datepicker" id="ngayketthuc" value=" ">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div id="checkthu" class="form-group label-floating">
                                        <label class="control-label">Thứ học (VD: 2,4,6)</label>
                                        <input type="text" class="form-control" id="ngayhoc" value="">
                                        <code class="hidden" id="loithu"></code>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div id="checkbuoi" class="form-group label-floating">
                                        <label class="control-label">Buổi học (VD: 1)</label>
                                        <input type="text" class="form-control" id="buoihoc" value="">
                                        <code class="hidden" id="loibuoi"></code>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-rose" data-dismiss="modal" onclick="taolich('<?php echo $row[0]?>')">Tạo lịch</button>
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
<!--  Full Calendar Plugin    -->
<script src="../assets/js/fullcalendar.min.js"></script>
<!--	Plugin for Fileupload -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!-- Auto format money -->
<script src="../assets/js/simple.money.format.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>

<script type="text/javascript">
    var check = 0;
    $(document).ready(function () {
        $('#suahocphi').simpleMoneyFormat();
        $('#sualuong').simpleMoneyFormat();
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
        $('#ngayhoc').blur(function () {
            var thu = $(this).val();
            if(/^[2-8,]*$/.test(thu)==false||thu == ""){
                document.getElementById("checkthu").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loithu").setAttribute("class","");
                document.getElementById("loithu").innerHTML = "Thứ không hợp lệ";
                check = 1;
            }else {
                document.getElementById("checkthu").setAttribute("class", "form-group label-floating");
                document.getElementById("loithu").setAttribute("class", "hidden");
                check = 0;
            }
        });
        $('#buoihoc').blur(function () {
            var buoi = $(this).val();
            if(/^[0-9]*$/.test(buoi)==false||buoi ==""){
                document.getElementById("checkbuoi").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loibuoi").setAttribute("class","");
                document.getElementById("loibuoi").innerHTML = "Tên buổi học không hợp lệ";
                check = 1;
            }else {
                document.getElementById("checkbuoi").setAttribute("class", "form-group label-floating");
                document.getElementById("loibuoi").setAttribute("class", "hidden");
                check = 0;
            }
        });
    });
    //Tạo lịch
    function taolich(lop) {
        var batdau = $('#ngaybatdau').val();
        var ketthuc = $('#ngayketthuc').val();
        var thu = $('#ngayhoc').val();
        var buoi = $('#buoihoc').val();
        if(/^[2-8,]*$/.test(thu)==false||thu == ""){
            document.getElementById("checkthu").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loithu").setAttribute("class","");
            document.getElementById("loithu").innerHTML = "Thứ không hợp lệ";
            check = 1;
        }
        if(/^[0-9]*$/.test(buoi)==false||buoi ==""){
            document.getElementById("checkbuoi").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loibuoi").setAttribute("class","");
            document.getElementById("loibuoi").innerHTML = "Tên buổi học không hợp lệ";
            check = 1;
        }
        if(check===0){
            $.get("modules/lichhoc.php",{lop:lop,batdau:batdau,ketthuc:ketthuc,thu:thu,buoi:buoi},function () {
                swal({
                    title: 'Tạo lịch thành công!',
                    text: 'Đã thêm lịch học',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).then(function () {
                    location.reload();
                })
            })
        }
    }
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
        eventResize:function(event){
            var start = event.start;
            var lichhoc = start.format("MM/DD/YYYY");
            var title = event.title;
            var lop = "<?php echo $row[0]?>";
            $.get("modules/lichhoc.php?start="+lichhoc+"&title="+title.toUpperCase()+"&lop="+lop);
        },
        eventDrop:function(event){
            var start = event.start;
            var lichhoc = start.format("MM/DD/YYYY");
            var title = event.title;
            var lop = "<?php echo $row[0]?>";
            $.get("modules/lichhoc.php?start="+lichhoc+"&title="+title.toUpperCase()+"&lop="+lop);
        },
        // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
        events: [
            <?php
                $sqlSelectLH = "select * from lichhoc where lop = '$row[0]'";
                $resultLH = mysqli_query($conn,$sqlSelectLH);
                while ($rowLH = mysqli_fetch_assoc($resultLH)){
                    ?>
                    {
                        title: '<?php echo "Buổi ".$rowLH["buoi"]?>',
                        start: '<?php echo $rowLH["ngay"]?>',
                        className: 'event-azure',
                        allDay: true,
                        url: 'admin_diemdanh.php?lop=<?php echo $row[0]?>&b=<?php echo $rowLH["buoi"]?>'
                    },
            <?php
                }
            ?>
        ]
    });
    function themhocvien(lop) {
       window.location.href = "admin_hocvienlop.php?lop="+lop;
    }
    function sualop() {
        var tenlop = $("#suatenlop").val();
        var khaigiang = $("#suakhaigiang").val();
        var doituong = $("#suadoituong").val();
        var phonghoc = $("#suaphonghoc").val();
        var cahoc = $("#suacahoc").val();
        var giaovien = $("#suagiaovien").val();
        var hocphi = $("#suahocphi").val();
        var luong = $("#sualuong").val();
        $.get("modules/updatedatabase.php",{tenlop:tenlop,khaigiang:khaigiang,doituong:doituong,phonghoc:phonghoc,cahoc:cahoc,giaovien:giaovien,hocphi:hocphi,luong:luong},function () {
            swal({
                title: 'Sửa lớp thành công!',
                text: 'Đã sửa thông tin lớp học',
                type: 'success',
                confirmButtonClass: "btn btn-success",
                buttonsStyling: false
            }).then(function () {
                location.reload();
            })
        })
    }
    function xacnhanxoa(tk,lop) {
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
                $.get("modules/deldatabase.php?tkhv="+tk+"&lop="+lop,function () {
                    var child = document.getElementById(tk);
                    child.parentNode.removeChild(child);
                });
            })
        })
    }
    function donglop(tenlop) {
        swal({
            title: 'Đóng thật không?',
            text: 'Bạn chắc chắn muốn đóng lớp?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hỏi làm gì.Đóng đi',
            cancelButtonText: 'Không',
            confirmButtonClass: "btn btn-success",
            cancelButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).then(function() {
            swal({
                title: 'Đã đóng lớp!',
                text: 'Mất tiêu luôn.',
                type: 'success',
                confirmButtonClass: "btn btn-success",
                buttonsStyling: false
            }).then(function () {
                $.get("modules/updatedatabase.php?dongtenlop="+tenlop,function () {
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


