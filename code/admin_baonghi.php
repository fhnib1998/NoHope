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
                            <li>
                                <a href="admin_hocvien.php">Danh sách học viên</a>
                            </li>
                            <li class="active">
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
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">work_off</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Thông báo nghỉ</h4>
                            <br>
                            <div class="row col-sm-offset-1">
                                <div class="col-sm-5">
                                    <div id="checktenbuoinghi" class="form-group label-floating">
                                        <label class="control-label">Tên buổi nghỉ</label>
                                        <input type="text" class="form-control" id="tenbuoinghi" >
                                        <code class="hidden" id="loitenbuoinghi"></code>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div id="checkngaynghi" class="form-group label-floating">
                                        <label class="control-label">Ngày nghỉ</label>
                                        <input type="text" class="form-control datepicker" id="ngaynghi">
                                        <code class="hidden" id="loingaynghi"></code>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row col-sm-offset-1">
                                <div class="col-sm-6">
                                    <div id="checklido" class="form-group label-floating">
                                        <label class="control-label">Lí do nghỉ</label>
                                        <textarea class="form-control" rows="2" id="lido"></textarea>
                                        <code class="hidden" id="loilido"></code>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <select id="lop" onchange="checklop()" class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select">
                                        <option disabled selected>Chọn lớp</option>
                                        <?php
                                        $sqlSelect = "select * from lop where dong = 0";
                                        $result = mysqli_query($conn,$sqlSelect) or die("Lỗi câu truy vấn");
                                        while ($row = mysqli_fetch_assoc($result)){?>
                                            <option value="<?php echo $row["tenlop"]?>"><?php echo $row["tenlop"]?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <code class="hidden" id="loilop"></code>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-1 col-md-offset-9">
                                <button type="submit" class="btn btn-rose" onclick="thongbaonghi()" name="them">Thông báo</button>
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
<!-- Auto format money -->
<script src="../assets/js/simple.money.format.js"></script>
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
        $("#tenbuoinghi").blur(function () {
            var tenbuoinghi = $(this).val();
            if(tenbuoinghi===""){
                document.getElementById("checktenbuoinghi").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loitenbuoinghi").setAttribute("class","");
                document.getElementById("loitenbuoinghi").innerHTML = "Tên buổi nghỉ không được để trống";
            }
            else {
                document.getElementById("checktenbuoinghi").setAttribute("class", "form-group label-floating");
                document.getElementById("loitenbuoinghi").setAttribute("class", "hidden");
            }
        });
        $("#ngaynghi").blur(function () {
            var ngaynghi = $(this).val();
            if(ngaynghi===""){
                document.getElementById("checkngaynghi").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loingaynghi").setAttribute("class","");
                document.getElementById("loingaynghi").innerHTML = "Chưa chọn ngày nghỉ";
            }
            else {
                document.getElementById("checkngaynghi").setAttribute("class", "form-group label-floating");
                document.getElementById("loingaynghi").setAttribute("class", "hidden");
            }
        });
        $("#lido").blur(function () {
            var lido = $(this).val();
            if(lido===""){
                document.getElementById("checklido").setAttribute("class","form-group label-floating has-error");
                document.getElementById("loilido").setAttribute("class","");
                document.getElementById("loilido").innerHTML = "Lí do không được để trống";
            }
            else {
                document.getElementById("checklido").setAttribute("class", "form-group label-floating");
                document.getElementById("loilido").setAttribute("class", "hidden");
            }
        });
    });
    function checklop() {
        document.getElementById("loilop").setAttribute("class", "hidden");
    }
    function thongbaonghi() {
        var lop = $("#lop").val();
        var ngaynghi = $("#ngaynghi").val();
        var lido = $("#lido").val();
        var tenbuoinghi = $("#tenbuoinghi").val();
        if(tenbuoinghi==="")
        {
            document.getElementById("checktenbuoinghi").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loitenbuoinghi").setAttribute("class","");
            document.getElementById("loitenbuoinghi").innerHTML = "Tên buổi nghỉ không được để trống";
        }
        if(ngaynghi==="")
        {
            document.getElementById("checkngaynghi").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loingaynghi").setAttribute("class","");
            document.getElementById("loingaynghi").innerHTML = "Chưa chọn ngày nghỉ";
        }
        if(lido==="")
        {
            document.getElementById("checklido").setAttribute("class","form-group label-floating has-error");
            document.getElementById("loilido").setAttribute("class","");
            document.getElementById("loilido").innerHTML = "Lí do không được để trống";
        }
        if(lop==null)
        {
            document.getElementById("loilop").setAttribute("class","");
            document.getElementById("loilop").innerHTML = "Chưa chọn lóp";
        }
        if(tenbuoinghi!==""&&ngaynghi!==""&&lido!==""&&lop!==""){
            $.get("modules/baonghi.php",{lop:lop,b:tenbuoinghi,ngaynghi:ngaynghi,lido:lido});
            swal({
                title: "Đã thông báo nghỉ!",
                text: "Đã gửi mail đến phụ huynh",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success",
                type: "success"
            }).then(function () {
                location.reload();
            });
        }
    }
</script>

</html>


