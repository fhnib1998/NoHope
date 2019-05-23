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
        $sqlUpdate = "UPDATE `hocvien` SET `tk`='$taikhoan',`mk`='$matkhau',`hoten`='$hoten',`ngaysinh`='$ngaysinh',`gioitinh`='$gioitinh',`sdt`='$sdt',`gmail`='$gmail' WHERE tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
    }
    if($_GET["tenlop"]){
        $tenlop = $_GET["tenlop"];
        $khaigiang = $_GET["khaigiang"];
        $phonghoc = $_GET["phonghoc"];
        $cahoc = $_GET["cahoc"];
        $doituong = $_GET["doituong"];
        $giaovien = $_GET["giaovien"];
        if($giaovien == ""){
            $sqlUpdate = "UPDATE `lop` SET `khaigiang`='$khaigiang',`phonghoc`='$phonghoc',`cahoc`='$cahoc',`doituong`='$doituong' WHERE tenlop = '$tenlop'";
        } else{
            $sqlUpdate = "UPDATE `lop` SET `khaigiang`='$khaigiang',`giaovien`='$giaovien',`phonghoc`='$phonghoc',`cahoc`='$cahoc',`doituong`='$doituong' WHERE tenlop = '$tenlop'";
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


