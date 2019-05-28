<?php
    include ("kndatabase.php");
    if(isset($_GET["tk"])){
        $taikhoan = $_GET["tk"];
        $matkhau = $_GET["mk"];
        $sqlUpdate = "update giaovien set mk='$matkhau'where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlUpdate = "update hocvien set mk='$matkhau'where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlUpdateTV = "update thanhvien set mk ='$matkhau' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdateTV);
    }
    if(isset($_GET["tkgv"])){
        $taikhoan = $_GET["tkgv"];
        $hoten = $_GET["hoten"];
        $ngaysinh = $_GET["ngaysinh"];
        $gioitinh = $_GET["gioitinh"];
        $sodienthoai = $_GET["sodienthoai"];
        $trinhdo = $_GET["trinhdo"];
        $avatar_name=$_GET["avatar_name"];
        $avatar_tmp=$_GET["avatar_tmp"];
        $avatar = "../uploads/".$avatar_name;
        move_uploaded_file($avatar_tmp,$avatar);
        if($avatar_name != ""){
            $sqlUpdate = "UPDATE giaovien SET hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sodienthoai',trinhdo='$trinhdo',avatar='$avatar' WHERE tk='$taikhoan'";
            mysqli_query($conn,$sqlUpdate) or die("Lỗi truy vấn");
        }else{
            $sqlUpdate = "UPDATE giaovien SET hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sodienthoai',trinhdo='$trinhdo' WHERE tk='$taikhoan'";
            mysqli_query($conn,$sqlUpdate) or die("Lỗi truy vấn");
        }
    }
    if(isset($_GET["tkgvad"])){
        $taikhoan = $_GET["tkgvad"];
        $matkhau = $_GET["mk"];
        $hoten = $_GET["hoten"];
        $ngaysinh = $_GET["ngaysinh"];
        $gioitinh = $_GET["gioitinh"];
        $sodienthoai = $_GET["sodienthoai"];
        $trinhdo = $_GET["trinhdo"];
        $avatar_name=$_GET["avatar_name"];
        $avatar_tmp=$_GET["avatar_tmp"];
        $avatar = "../uploads/".$avatar_name;
        move_uploaded_file($avatar_tmp,$avatar);
        if($avatar_name != ""){
            $sqlUpdate = "UPDATE giaovien SET mk = '$matkhau',hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sodienthoai',trinhdo='$trinhdo',avatar='$avatar' WHERE tk='$taikhoan'";
            mysqli_query($conn,$sqlUpdate) or die("Lỗi truy vấn");
        }else{
            $sqlUpdate = "UPDATE giaovien SET mk = '$matkhau',hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sodienthoai',trinhdo='$trinhdo' WHERE tk='$taikhoan'";
            mysqli_query($conn,$sqlUpdate) or die("Lỗi truy vấn");
        }
        $sqlUpdateTV = "update thanhvien set mk ='$matkhau' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdateTV);
    }
    if(isset($_GET["tkhv"])){
        $taikhoan = $_GET["tkhv"];
        $hoten = $_GET["hoten"];
        $ngaysinh = $_GET["ngaysinh"];
        $gioitinh = $_GET["gioitinh"];
        $sdt = $_GET["sdt"];
        $gmail = $_GET["gmail"];
        $avatar_name=$_GET["avatar_name"];
        $avatar_tmp=$_GET["avatar_tmp"];
        $avatar = "../uploads/".$avatar_name;
        move_uploaded_file($avatar_tmp,$avatar);
        if($avatar_name != ""){
            $sqlUpdate = "update hocvien set hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',gmail='$gmail',avatar='$avatar' where tk = '$taikhoan'";
            mysqli_query($conn,$sqlUpdate);
        }else{
            $sqlUpdate = "update hocvien set hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',gmail='$gmail' where tk = '$taikhoan'";
            mysqli_query($conn,$sqlUpdate);
        }
    }
    if(isset($_GET["tkhvad"])){
        $taikhoan = $_GET["tkhvad"];
        $matkhau = $_GET['mk'];
        $hoten = $_GET["hoten"];
        $ngaysinh = $_GET["ngaysinh"];
        $gioitinh = $_GET["gioitinh"];
        $sdt = $_GET["sdt"];
        $gmail = $_GET["gmail"];
        $sqlUpdate = "update hocvien set mk='$matkhau',hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',gmail='$gmail' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlUpdateTV = "update thanhvien set mk ='$matkhau' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdateTV);
    }
    if(isset($_GET["tenlop"])){
        $tenlop = $_GET["tenlop"];
        $khaigiang = $_GET["khaigiang"];
        $phonghoc = $_GET["phonghoc"];
        $cahoc = $_GET["cahoc"];
        $doituong = $_GET["doituong"];
        $giaovien = $_GET["giaovien"];
        $sqlSelectLop = "select giaovien from lop where tenlop = '$tenlop'";
        $rowLop = mysqli_fetch_row(mysqli_query($conn,$sqlSelectLop));
        $giaovienC = $rowLop[0];
        if($giaovienC == $giaovien|| $giaovien == ""){
            $sqlUpdate = "update lop set khaigiang='$khaigiang',phonghoc='$phonghoc',cahoc='$cahoc',doituong='$doituong' where tenlop = '$tenlop'";
        }else{
            $sqlUpdate = "update lop set khaigiang='$khaigiang',giaovien='$giaovien',phonghoc='$phonghoc',cahoc='$cahoc',doituong='$doituong' where tenlop = '$tenlop'";
            $sqlSelectGVC = "Select tk,lop from giaovien where hoten = '$giaovienC'";
            $rowC = mysqli_fetch_row(mysqli_query($conn,$sqlSelectGVC));
            $taikhoanC = $rowC[0];
            $lop = $rowC[1];
            $lopC = str_replace("$tenlop,","","$lop");
            $sqlUpdateC = "Update giaovien set lop ='$lopC' where tk = '$taikhoanC'";
            mysqli_query($conn,$sqlUpdateC);
            $sqlSelectGVM = "Select tk,lop from giaovien where hoten = '$giaovien'";
            $rowM = mysqli_fetch_row(mysqli_query($conn,$sqlSelectGVM));
            $taikhoanM = $rowM[0];
            $lopM = $tenlop.",".$rowM[1];
            $sqlUpdateM = "Update giaovien set lop ='$lopM' where tk = '$taikhoanM'";
            mysqli_query($conn,$sqlUpdateM);
        }
        mysqli_query($conn,$sqlUpdate);
    }
    if(isset($_GET["tkdd1"])){
        $taikhoan = $_GET["tkdd1"];
        $b = $_GET["b"];
        $sqlUpdate = "update hocvien set $b = 1 where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
    }
    if(isset($_GET["tkdd0"])){
        $taikhoan = $_GET["tkdd0"];
        $b = $_GET["b"];
        $sqlUpdate = "update hocvien set $b = 0 where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
    }


