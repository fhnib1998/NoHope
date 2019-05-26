<?php
    include ("kndatabase.php");
    if($_GET["tkhv"]){
        $taikhoan = $_GET["tkhv"];
        $matkhau = $_GET["mk"];
        $hoten = $_GET["hoten"];
        $ngaysinh = $_GET["ngaysinh"];
        $gioitinh = $_GET["gioitinh"];
        $sdt = $_GET["sdt"];
        $gmail = $_GET["gmail"];
        $sqlUpdate = "update hocvien set mk='$matkhau',hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',gmail='$gmail' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlUpdateTV = "update thanhvien set mk = '$matkhau' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdateTV);
    }
    if($_GET["tenlop"]){
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
    if($_GET["tkdd1"]){
        $taikhoan = $_GET["tkdd1"];
        $b = $_GET["b"];
        $sqlUpdate = "update hocvien set $b = 1 where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
    }
    if($_GET["tkdd0"]){
        $taikhoan = $_GET["tkdd0"];
        $b = $_GET["b"];
        $sqlUpdate = "update hocvien set $b = 0 where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
    }


