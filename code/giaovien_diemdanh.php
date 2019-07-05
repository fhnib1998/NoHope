<?php
    ob_start();
    session_start();
    include("modules/kndatabase.php");
    $lop = $_GET["lop"];
    $sqlSelectL = "select giaovien,luong from lop where tenlop = '$lop'";
    $rowL = mysqli_fetch_row(mysqli_query($conn,$sqlSelectL));
    $b = $_GET["b"];
    $ngay = strtotime($_GET["ngay"]);
    $homnay = strtotime(date("m/d/Y"));
    $sqlSelectD = "select dd from diemdanh where lop = '$lop' and buoi = '$b'";
    $resultD = mysqli_query($conn,$sqlSelectD);
    $diemdanh = 0;
    if($rowD = mysqli_fetch_row($resultD)){
        $diemdanh = 1;
    }
    if($ngay == $homnay && $diemdanh == 1){
        header("location: giaovien_diemdanhbu.php?lop=$lop&b=$b");
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
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">assignment_turned_in</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Điểm danh lớp <?php echo $lop;?> buổi <?php echo $b?></h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Họ tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Giới tính</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sqlSelect = "select tk,hoten,ngaysinh,gioitinh from hocvien where lop like '%$lop%'";
                                    $result = mysqli_query($conn,$sqlSelect);
                                    while ($row = mysqli_fetch_assoc($result)){ ?>
                                        <tr>
                                            <td><?php echo $row["hoten"]?></td>
                                            <td><?php echo $row["ngaysinh"]?></td>
                                            <td><?php echo $row["gioitinh"]?></td>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input id="<?php echo $row["tk"]?>" name="diemdanh" type="checkbox" <?php $tk = $row["tk"]; $sqlSelectD = "select dd from diemdanh where tk = '$tk' and lop = '$lop' and buoi = '$b'";$resultD = mysqli_query($conn,$sqlSelectD);$rowD = mysqli_fetch_row($resultD); if($rowD[0] == 1){echo "checked";}?>>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                                    if($diemdanh == 0){?>
                                        <button id="diemdanh" type="button" class="btn btn-rose pull-right" onclick="diemdanhlop('<?php echo $lop?>','<?php echo $b?>','<?php echo $rowL[0]?>','<?php echo $rowL[1]?>')">Điểm danh</button>
                                        <button type="button" class="btn btn-default pull-right" onclick="quaylai('<?php echo $lop?>')">Quay lại</button>
                                <?php
                                    }else{?>
                                        <button type="button" class="btn btn-default pull-right" onclick="quaylai('<?php echo $lop?>')">Quay lại</button>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
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
    function diemdanhlop(lop,b,giaovien,luong) {
        $("#diemdanh").html("Đang điểm danh ...");
        $.get("modules/updatedatabase.php",{giaovien:giaovien,luong:luong});
        var checkbox = document.getElementsByName("diemdanh");
        for (var i = 0; i < checkbox.length; i++){
            var tk = checkbox[i].getAttribute("id");
            if (checkbox[i].checked === true){
                $.get("modules/updatedatabase.php",{tkdd1:tk,b:b,lop:lop});
            }else{
                $.get("modules/updatedatabase.php",{tkdd0:tk,b:b,lop:lop});
            }
        }
        swal({
            title: "Đang điểm danh!",
            text: "Chờ xíu nhé.Một tý thôi.",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            type: "success"
        }).then(function () {
            window.location.href = "giaovien_chitietlop.php?tenlop="+lop;
        });
    }
    function quaylai(lop) {
        window.location.href = "giaovien_chitietlop.php?tenlop="+lop;
    }
</script>
</html>


