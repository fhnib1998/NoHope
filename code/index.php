<?php
    ob_start();
    session_start();
    include("modules/kndatabase.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">
    <title>
        No Hope Center
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assetsKIT/css/material-kit.css?v=2.0.3">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assetsKIT/css/demo.css" rel="stylesheet" />
    <link href="../assetsKIT/css/vertical-nav.css" rel="stylesheet" />
</head>

<body class="landing-page ">
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="index.php">No Hope Center</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">class</i> Các khóa học
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="#" class="dropdown-item">
                            <i class="material-icons">class</i> Khóa học
                        </a>
                    </div>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">description</i> Tài liệu
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="#" class="dropdown-item">
                            <i class="material-icons">description</i> Tài liệu
                        </a>
                    </div>
                </li>
                <?php
                    if(!isset($_SESSION['tk'])){?>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">
                                <i class="material-icons">account_circle</i> Đăng nhập
                            </a>
                        </li>
                <?php
                    }else{?>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="material-icons">account_circle</i> Chào, <?php if(isset($_SESSION['hoten'])){echo $_SESSION['hoten'];} else{echo 'Admin';} ?>
                            </a>
                            <div class="dropdown-menu dropdown-with-icons">
                                <?php
                                    if($_SESSION['quyen']=="admin"){?>
                                        <a href="admin_lop.php" class="dropdown-item">
                                            <i class="material-icons">dashboard</i>Quản lí
                                        </a>
                                <?php
                                    }else if($_SESSION['quyen']=="gv"){?>
                                        <a href="giaovien_lop.php" class="dropdown-item">
                                            <i class="material-icons">dashboard</i>Quản lí
                                        </a>
                                <?php
                                    } else{?>
                                        <a href="hocvien_lop.php" class="dropdown-item">
                                            <i class="material-icons">dashboard</i>Quản lí
                                        </a>
                                <?php
                                    }
                                ?>

                                <a href="login.php" class="dropdown-item">
                                    <i class="material-icons">power_settings_new</i>Đăng xuất
                                </a>
                            </div>
                        </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
<div class="page-header header-filter" data-parallax="true" style=" background-image: url('../assetsKIT/img/iigtreem.jpg'); ">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">No Hope Center</h1>
                <h4>No Hope là trung tâm tiếng Anh trẻ em dành cho trẻ từ 4-14 tuổi sử dụng phương pháp học CLIL chuẩn Cambridge, giúp trẻ phát triển tư duy và tự tin giao tiếp như người bản ngữ.</h4>
                <br>
                <br/>
                <a href="#dangkituvan" class="btn btn-danger btn-raised btn-lg">
                    <i class="material-icons">how_to_reg</i> Đăng kí ngay
                </a>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">TẠI SAO BẠN NÊN CHO CON HỌC TẠI NO HOPE?</h2>
                    <h5 class="description">Với đội ngũ giáo viên nước ngoài giàu kinh nghiệm, trình độ chuyên môn cao, trung tâm anh ngữ No Hope mang đến cho học viên cơ hội trải nghiệm môi trường tiếng Anh toàn diện và đồng hành cùng học viên từ những bước đầu tiên để chinh phục khả năng Anh ngữ của mình.</h5>
                </div>
            </div>
            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-info">
                                <i class="material-icons">card_travel</i>
                            </div>
                            <h4 class="info-title">Phương pháp học</h4>
                            <h5>Phương pháp học 4 kỹ năng chuẩn Cambridge.Ứng dụng công nghệ 4.0 trong học tập.</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-rose">
                                <i class="material-icons">school</i>
                            </div>
                            <h4 class="info-title">Giáo viên</h4>
                            <h5>100% giáo viên bản ngữ chuẩn quốc tế.Giáo trình chuẩn hóa phương pháp học CLIL.</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Cam kết</h4>
                            <h5>Cam kết đầu ra chuẩn Cambridge bằng hợp đồng</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-header" data-parallax="active" style="background-image: url('../assetsKIT/img/traihe.jpg')">
        <a href="#dangkituvan" class="btn btn-danger btn-raised btn-lg" style="margin-left: 900px;margin-top: 500px">
            <i class="material-icons">how_to_reg</i> Đăng kí ngay
        </a>
    </div>
    <div class="section" >
        <div class="container">
            <h2 class="title text-center">Khóa học sắp khai giảng</h2>
            <p class="description text-center">Nhấn đăng kí để được tư vấn trực tiếp</p>
            <br>
            <div class="col-md-10 mr-auto ml-auto">
                <div class="card card-raised card-carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="../assetsKIT/img/traihe.jpg">
                            </div>
                            <?php
                                $sqlSelect = "select * from khoahoc";
                                $result = mysqli_query($conn,$sqlSelect);
                                while ($row = mysqli_fetch_assoc($result)){?>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?php echo $row['image']?>">
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ml-auto mr-auto">
                <a href="#dangkituvan" class="btn btn-danger btn-raised btn-lg">
                    <i class="material-icons">how_to_reg</i> Đăng kí ngay
                </a>
            </div>
        </div>
    </div>
    <div class="section section-image" style="background-image: url('../assetsKIT/img/lophocbe1.jpg');">
        <div class="container">
            <h2 class="title text-center">Đội ngũ giáo viên</h2>
            <h4 class="description text-center">100% giáo viên nước ngoài, Việt Nam đạt tiêu chuẩn sư phạm, trẻ trung, nhiệt tình, năng động,...</h4>
            <br><br>
            <div class="row">
                <?php
                $sqlSelect = "select * from giaovien";
                $result = mysqli_query($conn,$sqlSelect) or die("Lỗi câu truy vấn");
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-md-4 ml-auto mr-auto">
                        <div class="card card-profile">
                            <div class="card-header card-avatar">
                                <img class="img" src="<?php if($row['avatar']==null){echo "../assets/img/anime3.jpg";}else{echo $row['avatar'];} ?>"/>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $row["hoten"];?></h3>
                                <h5 class="card-category text-muted">Giáo viên</h5>
                                <h4 class="card-description">
                                    Ngày sinh: <?php echo $row["ngaysinh"];?><br>
                                    Giới tính: <?php echo $row["gioitinh"];?><br>
                                    Trình độ: <?php echo $row["trinhdo"];?><br>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="blogs-1" id="blogs-1">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <h2 class="title">Các khóa học</h2>
                    <br>
                    <div class="card card-plain card-blog">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card-header card-header-image">
                                    <a href="#pablito">
                                        <img class="img" src="../assetsKIT/img/examples/card-blog4.jpg">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h6 class="card-category text-info">Enterprise</h6>
                                <h3 class="card-title">
                                    <a href="#pablo">Autodesk looks to future of 3D printing with Project Escher</a>
                                </h3>
                                <p class="card-description">
                                    Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses. Today, it’s moving to a subscription model. Yet its own business model disruption is only part of the story — and…
                                    <a href="#pablo"> Read More </a>
                                </p>
                                <p class="author">
                                    by
                                    <a href="#pablo">
                                        <b>Mike Butcher</b>
                                    </a>, 2 days ago
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-plain card-blog">
                        <div class="row">
                            <div class="col-md-7">
                                <h6 class="card-category text-danger">
                                    <i class="material-icons">trending_up</i> Trending
                                </h6>
                                <h3 class="card-title">
                                    <a href="#pablo">6 insights into the French Fashion landscape</a>
                                </h3>
                                <p class="card-description">
                                    Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses. Today, it’s moving to a subscription model. Yet its own business model disruption is only part of the story — and…
                                    <a href="#pablo"> Read More </a>
                                </p>
                                <p class="author">
                                    by
                                    <a href="#pablo">
                                        <b>Mike Butcher</b>
                                    </a>, 2 days ago
                                </p>
                            </div>
                            <div class="col-md-5">
                                <div class="card-header card-header-image">
                                    <img class="img img-raised" src="../assetsKIT/img/office2.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contactus-1 section-image" style="background-image: url('../assetsKIT/img/examples/city.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="title">No Hope Center</h2>
                    <div class="info info-horizontal">
                        <div class="icon icon-primary">
                            <i class="material-icons">pin_drop</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Các cơ sở</h4>
                            <span> Cơ sở 1: 243 Hoàng Văn Thái, Thanh Xuân, Hà Nội</span><br><br>
                            <span> Cơ sở 2: 141 Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội</span>
                        </div>
                    </div>
                    <div class="info info-horizontal">
                        <div class="icon icon-primary">
                            <i class="material-icons">phone</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Liên hệ</h4>
                            <span>Hotline: 0383173311</span><br><br>
                            <span>Email: fhnibkma@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 ml-auto">
                    <div class="card card-contact">
                        <form id="dangkituvan">
                            <div class="card-header card-header-raised card-header-rose text-center">
                                <h4 class="card-title">Đăng kí tư vấn</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating is-empty">
                                            <label class="bmd-label-floating">Họ tên</label>
                                            <input type="text" id="hoten" class="form-control">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating is-empty">
                                            <label class="bmd-label-floating">Số điện thoại</label>
                                            <input type="text" id="sdt" class="form-control">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" id="email" class="form-control">
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label for="exampleMessage1" class="bmd-label-floating">Lời nhắn</label>
                                    <textarea class="form-control" id="loinhan" rows="4"></textarea>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="card-footer justify-content-between pull-right">
                                <button type="button" class="btn btn-rose" onclick="dangkituvan()">Đăng kí</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer ">
    <div class="container">
        <div class="copyright pull-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script> No Hope, Study and Succeed afterward
        </div>
    </div>
</footer>
<!--   Core JS Files   -->
<script src="../assetsKIT/js/core/jquery.min.js"></script>
<script src="../assetsKIT/js/core/popper.min.js"></script>
<script src="../assetsKIT/js/bootstrap-material-design.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>
<!-- Plugins for presentation and navigation  -->
<script src="../assetsKIT/js/modernizr.js"></script>
<script src="../assetsKIT/js/vertical-nav.js"></script>
<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="../assetsKIT/js/material-kit.js?v=2.0.3"></script>
<!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
<script src="../assetsKIT/js/material-kit-demo.js"></script>
<script>
    function dangkituvan() {
        var hoten = $('#hoten').val();
        var sdt = $('#sdt').val();
        var email = $('#email').val();
        var loinhan = $('#loinhan').val();
        $.get("modules/dangkituvan.php",{hoten:hoten,sdt:sdt,email:email,loinhan:loinhan});
    }
</script>
</body>

</html>