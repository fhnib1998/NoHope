<?php
    ob_start();
    include("modules/kndatabase.php");
    $selectGiaovien = "select * from giaovien";
    $resultGiaovien = mysqli_query($conn,$selectGiaovien)or die("Lỗi truy vấn");
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
                                <a href="admin_lop.php">Danh sách lớp học</a>
                            </li>
                            <li class="active">
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
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <b class="material-icons">person_add</b>
                        </div>
                        <form class="form-horizontal">
                            <div class="card-content">
                                <h4 class="card-title">Thêm lớp học</h4>
                                <br>
                                <div class="row col-sm-offset-1">
                                    <div class="col-sm-5">
                                        <div id="checktenlop" class="form-group label-floating">
                                            <label class="control-label">Tên lớp</label>
                                            <input type="text" class="form-control" id="tenlop" >
                                            <code class="hidden" id="loitenlop"></code>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div id="checkkhaigiang" class="form-group label-floating">
                                            <label class="control-label">Khai giảng</label>
                                            <input type="text" class="form-control datepicker" id="khaigiang">
                                            <code class="hidden" id="loikhaigiang"></code>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row col-sm-offset-1">
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Đối tượng</label>
                                            <input type="text" class="form-control" id="doituong" >
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Phòng học</label>
                                            <input type="text" class="form-control" id="phonghoc" >
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row col-sm-offset-1">
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Ca học</label>
                                            <input type="text" class="form-control" id="cahoc" >
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <select id="giaovien" class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select">
                                            <option disabled selected>Chọn giáo viên</option>
                                            <?php
                                            while ($rowGiaovien = mysqli_fetch_assoc($resultGiaovien)){?>
                                                <option value="<?php echo $rowGiaovien["hoten"]?>"><?php echo $rowGiaovien["hoten"]?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-1 col-md-offset-9">
                            <button type="submit" class="btn btn-rose" onclick="themlop()" name="them">Thêm lớp học</button>
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

    var checklop = 0;
    $(document).ready(function () {
        demo.initFormExtendedDatetimepickers();
        $("#tenlop").blur(function () {
            var tenlop = $(this).val();
            if(tenlop==="") {
                document.getElementById("checktenlop").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loitenlop").setAttribute("class","");
                document.getElementById("loitenlop").innerHTML = "Tên lớp không được để trống";
                checklop=1;
            }
            else {
                $.get("modules/checklop.php",{tenlop:tenlop},function (data) {
                    if(data==1){
                        document.getElementById("checktenlop").setAttribute("class","form-group label-floating has-error");
                        document.getElementById("loitenlop").setAttribute("class","");
                        document.getElementById("loitenlop").innerHTML = "Tên lớp đã tồn tại";
                        checklop=1;
                    }
                    else {
                        document.getElementById("checktenlop").setAttribute("class","form-group label-floating");
                        document.getElementById("loitenlop").setAttribute("class","hidden");
                        checklop=0;
                    }
                });
            }
        });
        $("#khaigiang").blur(function () {
            var khaigiang = $(this).val();
            if(khaigiang===""){
                document.getElementById("checkkhaigiang").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loikhaigiang").setAttribute("class","");
                document.getElementById("loikhaigiang").innerHTML = "Chưa chọn ngày khai giảng";
            }
            else {
                document.getElementById("checkkhaigiang").setAttribute("class", "form-group label-floating");
                document.getElementById("loikhaigiang").setAttribute("class", "hidden");
            }
        });
    });
    function themlop() {
        var tenlop = $("#tenlop").val();
        var khaigiang = $("#khaigiang").val();
        var doituong = $("#doituong").val();
        var phonghoc = $("#phonghoc").val();
        var cahoc = $("#cahoc").val();
        var giaovien = $("#giaovien").val();
        if(tenlop==="")
        {
            document.getElementById("checktenlop").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loitenlop").setAttribute("class","");
            document.getElementById("loitenlop").innerHTML = "Tên lớp không được để trống";
        }
        if(khaigiang==="")
        {
            document.getElementById("checkkhaigiang").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loikhaigiang").setAttribute("class","");
            document.getElementById("loikhaigiang").innerHTML = "Chưa chọn ngày khai giảng";
        }
        if(tenlop!==""&&khaigiang!==""&&checklop===0){
            $.get("modules/adddatabase.php",{tenlop:tenlop,khaigiang:khaigiang,doituong:doituong,phonghoc:phonghoc,cahoc:cahoc,giaovien:giaovien},function () {
                swal({
                    title: 'Đã thêm!',
                    text: 'Thêm thành công học viên',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).then(function () {
                    window.location.href = "admin_lop.php";
                })
            })
        }
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


