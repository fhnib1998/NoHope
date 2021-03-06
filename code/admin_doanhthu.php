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
    if(isset($_GET["batdau"])){
        $batdau = $_GET["batdau"];
        $ketthuc = $_GET["ketthuc"];
        $timebd = strtotime($batdau);
        $timekt = strtotime($ketthuc);
        $thu = 0;
        $chi = 0;
    }
    if(isset($_GET["lop"])){
        $lop = $_GET["lop"];
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
    <link rel="stylesheet" href="../assets/css/all.css">
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
                        <input name="nam" type="text" class="form-control text-center" placeholder="Nhập năm">
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
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>Thống kê theo ngày</h4>
                        </div>
                        <div class="row col-md-offset-1">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ngày bắt đầu</label>
                                    <input type="text" class="form-control datepicker" value=" " id="batdau">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ngày kết thúc</label>
                                    <input type="text" class="form-control datepicker" value=" " id="ketthuc">
                                </div>
                            </div>
                            <button class="btn btn-rose btn-round col-md-3" onclick="thongke()">Thống kê</button>
                        </div>
                        <div class="card-header">
                            <h4>Thống kê theo lớp</h4>
                        </div>
                        <div class="row col-md-offset-1">
                            <div class="col-md-4">
                                <select id="thongke" class="selectpicker" onchange="thaydoi()" data-style="btn btn-primary btn-round" title="Single Select">
                                    <option disabled selected>Chọn thống kê</option>
                                    <option value="lop">Lớp</option>
                                    <option value="giaovien">Giáo viên</option>
                                    <option value="hocvien">Học viên</option>
                                </select>
                            </div>
                            <div id="chonlop" class="col-md-4 hidden">
                                <select id="lop" class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select">
                                    <option disabled selected>Chọn lớp</option>
                                    <?php
                                    $sqlSelect = "select tenlop from lop";
                                    $result = mysqli_query($conn,$sqlSelect);
                                    while ($rowL = mysqli_fetch_assoc($result)){?>
                                        <option value="<?php echo $rowL["tenlop"]?>"><?php echo $rowL["tenlop"]?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button class="btn btn-rose btn-round col-md-3" onclick="thongkelop()">Thống kê</button>
                        </div>
                        <br>
                    </div>
                </div>
                <br>
                <?php
                    if(isset($_GET["batdau"])){?>
                        <div class="col-md-8 col-sm-offset-2">
                            <br>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center">Thống kê doanh thu từ <?php echo $batdau?> - <?php echo $ketthuc?></h4>
                                </div>
                                <div class="table-responsive" style="margin-left: 10px">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>Ngày</th>
                                                <th>Nội dung</th>
                                                <th>Trạng thái</th>
                                                <th>Số tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sqlSelectCT = "select * from thongke";
                                        $resultCT = mysqli_query($conn,$sqlSelectCT);
                                        while ($rowCT = mysqli_fetch_assoc($resultCT)){
                                            $ngay = strtotime($rowCT["ngay"]);
                                            if($timebd < $ngay && $ngay < $timekt) {
                                                if($rowCT["trangthai"] == "Thu"){
                                                    $thu = $thu + $rowCT["tien"];
                                                }else{
                                                    $chi = $chi + $rowCT["tien"];
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $rowCT["ngay"] ?></td>
                                                    <td><?php echo $rowCT["noidung"] ?></td>
                                                    <td><?php echo $rowCT["trangthai"] ?></td>
                                                    <td><?php $tien = number_format($rowCT["tien"]);echo $tien ?> đ</td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="table-responsive col-md-offset-1">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>Tổng thu</th>
                                                <th>Tổng chi</th>
                                                <th>Doanh thu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <th><?php $tienthu = number_format($thu); echo $tienthu;?> đ</th>
                                            <th><?php $tienchi = number_format($chi); echo $tienchi;?> đ</th>
                                            <th><?php $doanhthu = number_format($thu - $chi); echo $doanhthu?> đ</th>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <?php
                    }elseif (isset($_GET["lop"])){?>
                            <div class="col-md-10 col-md-offset-1">
                                <br>
                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <b class="material-icons">toys</b>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Thống kê doanh thu lớp <?php echo $lop?></h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th class="text-center">Học viên</th>
                                                    <th class="text-center">Ngày sinh</th>
                                                    <th class="text-center">Đã nộp</th>
                                                    <th class="text-center">Chưa nộp</th>
                                                    <th class="text-center">Tổng tiền học</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $tongnop = 0;
                                                $tongchuanop = 0;
                                                $sqlSelect = "select tk,nop,chuanop from hocvienlop where lop = '$lop'";
                                                $result = mysqli_query($conn,$sqlSelect);
                                                while ($row = mysqli_fetch_assoc($result)){
                                                    $tk = $row["tk"];
                                                    $sqlSelectHV = "select hoten,ngaysinh from hocvien where tk='$tk'";
                                                    $resultHV = mysqli_query($conn,$sqlSelectHV);
                                                    $rowHV = mysqli_fetch_row($resultHV);
                                                    $tongnop = $tongnop + $row["nop"];
                                                    $tongchuanop = $tongchuanop + $row["chuanop"];?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $rowHV[0]?></td>
                                                        <td class="text-center"><?php echo $rowHV[1]?></td>
                                                        <td class="text-center"><?php $nop = number_format($row["nop"]); echo $nop?> đ</td>
                                                        <td class="text-center"><?php $chuanop = number_format($row["chuanop"]); echo $chuanop?> đ</td>
                                                        <td class="text-center"><?php $tong = number_format($row["chuanop"]+$row["nop"]); echo $tong?> đ</td>
                                                    </tr>
                                                    <?php
                                                } ?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th colspan="2" class="text-center">Tổng</th>
                                                    <th class="text-center"><?php $tongtiennop = number_format($tongnop); echo $tongtiennop;?> đ</th>
                                                    <th class="text-center"><?php $tongtienchuanop = number_format($tongchuanop); echo $tongtienchuanop;?> đ</th>
                                                    <th class="text-center"><?php $tongtien = number_format($tongnop + $tongchuanop); echo $tongtien;?> đ</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }elseif (isset($_GET["giaovien"])){?>
                        <div class="col-md-10 col-md-offset-1">
                            <br>
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <b class="material-icons">toys</b>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Thống kê giáo viên</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <tr>
                                                <th class="text-center">Giáo viên</th>
                                                <th class="text-center">Lớp đang dạy</th>
                                                <th class="text-center">Số buổi dạy</th>
                                                <th class="text-center">Đã trả</th>
                                                <th class="text-center">Chưa trả</th>
                                                <th class="text-center">Tổng tiền</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $tongtra = 0;
                                            $tongchuatra = 0;
                                            $sqlSelect = "select hoten,lop,sobuoiday,datra,chuatra from giaovien";
                                            $result = mysqli_query($conn,$sqlSelect);
                                            while ($row = mysqli_fetch_assoc($result)){
                                                $tongtra = $tongtra + $row["datra"];
                                                $tongchuatra = $tongchuatra + $row["chuatra"];?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row["hoten"]?></td>
                                                    <td class="text-center"><?php echo $row["lop"]?></td>
                                                    <td class="text-center"><?php echo $row["sobuoiday"]?></td>
                                                    <td class="text-center"><?php $tra = number_format($row["datra"]); echo $tra?> đ</td>
                                                    <td class="text-center"><?php $chuatra = number_format($row["chuatra"]); echo $chuatra?> đ</td>
                                                    <td class="text-center"><?php $tong = number_format($row["chuatra"]+$row["datra"]); echo $tong?> đ</td>
                                                </tr>
                                                <?php
                                            } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3" class="text-center">Tổng</th>
                                                    <th class="text-center"><?php $tongtientra = number_format($tongtra); echo $tongtientra;?> đ</th>
                                                    <th class="text-center"><?php $tongtienchuatra = number_format($tongchuatra); echo $tongtienchuatra;?> đ</th>
                                                    <th class="text-center"><?php $tongtien = number_format($tongtra + $tongchuatra); echo $tongtien;?> đ</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }else if(isset($_GET["hocvien"])){ ?>
                        <div class="col-md-10 col-md-offset-1">
                            <br>
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">toys</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Thống kê học viên</h4>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="text-primary">Họ tên</th>
                                                <th class="text-primary">Ngày sinh</th>
                                                <th class="text-primary">Đã nộp</th>
                                                <th class="text-primary">Chưa nộp</th>
                                                <th class="text-primary">Tổng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $tongnop = 0;
                                            $tongchuanop = 0;
                                            $sqlSelect = "select hoten,ngaysinh,nop,chuanop from hocvien";
                                            $result = mysqli_query($conn,$sqlSelect);
                                            while ($row = mysqli_fetch_assoc($result)){
                                                $tongnop = $row["nop"] + $tongnop;
                                                $tongchuanop = $row["chuanop"] + $tongchuanop;?>
                                                <tr>
                                                    <td><?php echo $row["hoten"]?></td>
                                                    <td><?php echo $row["ngaysinh"]?></td>
                                                    <td><?php $nop = number_format($row["nop"]); echo $nop?> đ</td>
                                                    <td><?php $chuanop = number_format($row["chuanop"]); echo $chuanop?> đ</td>
                                                    <td><?php $tong = number_format($row["nop"]+$row["chuanop"]); echo $tong?> đ</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="2" class="text-center">Tổng</th>
                                                <th><?php $tongtiennop = number_format($tongnop); echo $tongtiennop?> đ</th>
                                                <th><?php $tongtienchuanop = number_format($tongchuanop); echo $tongtienchuanop?> đ</th>
                                                <th><?php $tongtien = number_format($tongnop+$tongchuanop); echo $tongtien?> đ</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }else{?>
                        <div class="col-md-10 col-md-offset-1">
                            <br>
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <b class="material-icons">toys</b>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Doanh thu năm <?php echo $nam?></h4>
                                    <div class="table-responsive">
                                        <table class="table">
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
                                                    <td class="text-center"><?php $thu = number_format($row["thu"]); echo $thu?> đ</td>
                                                    <td class="text-center"><?php $chi = number_format($row["chi"]); echo $chi?> đ</td>
                                                    <td class="text-center"><?php $tong = number_format($row["thu"]-$row["chi"]); echo $tong?> đ</td>
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
                                                    <table class="table">
                                                        <thead class="text-primary">
                                                            <tr>
                                                                <th>Ngày</th>
                                                                <th>Nội dung</th>
                                                                <th>Lớp</th>
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
                                                                <td><?php echo $rowCT["lop"]?></td>
                                                                <td><?php $tien = number_format($rowCT["tien"]); echo $tien?> đ</td>
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
                    }
                ?>
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
<!--  Plugin for Fileupload -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../assets/js/jquery.datatables.js"></script>
<!-- Select Plugin -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>
<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Tìm kiếm",
            },

        });
        $('.card .material-datatables label').addClass('form-group');
    });
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
    function thongke() {
        var batdau = $('#batdau').val();
        var ketthuc = $('#ketthuc').val();
        window.location.href = "admin_doanhthu.php?batdau="+batdau+"&ketthuc="+ketthuc;
    }
    function thongkelop() {
        var thongke = $('#thongke').val();
        if(thongke == "lop"){
            var lop = $('#lop').val();
            window.location.href = "admin_doanhthu.php?lop="+lop;
        }
        else if(thongke == "giaovien"){
            window.location.href = "admin_doanhthu.php?giaovien=gv";
        }else {
            window.location.href = "admin_doanhthu.php?hocvien=hv";
        }
    }
    function thaydoi() {
        var thongke = $('#thongke').val();
        if(thongke == "lop"){
            document.getElementById("chonlop").setAttribute("class","col-md-4");
        }else {
            document.getElementById("chonlop").setAttribute("class","col-md-4 hidden");
        }
    }
</script>
</html>

