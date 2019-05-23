<?php
    include ("kndatabase.php");
    if(isset($_GET["taikhoangv"])){
        $taikhoan = $_GET["taikhoangv"];
        $matkhau = $_GET["matkhau"];
        $hoten = $_GET["hoten"];
        $ngaysinh = $_GET["ngaysinh"];
        $gioitinh = $_GET["gioitinh"];
        $sodienthoai = $_GET["sodienthoai"];
        $trinhdo = $_GET["trinhdo"];
        $avatar_name=$_GET["avatar_name"];
        $avatar_tmp=$_GET["avatar_tmp"];
        $avatar = "../uploads/".$avatar_name;
        move_uploaded_file($avatar_tmp,$avatar);
        $sqlInsert = "Insert into giaovien(`tk`, `mk`, `hoten`, `ngaysinh`, `gioitinh`, `sdt`, `trinhdo`, `avatar`) values('$taikhoan','$matkhau','$hoten','$ngaysinh','$gioitinh','$sodienthoai','$trinhdo','$avatar')";
        mysqli_query($conn, $sqlInsert) or die("Lỗi truy vẫn");
    }
    if(isset($_GET["taikhoanhv"])){
        $taikhoan = $_GET["taikhoanhv"];
        $matkhau = $_GET["matkhau"];
        $hoten = $_GET["hoten"];
        $ngaysinh = $_GET["ngaysinh"];
        $gioitinh = $_GET["gioitinh"];
        $sodienthoai = $_GET["sodienthoai"];
        $lop = $_GET["lop"];
        $gmail = $_GET["gmail"];
        $sqlSelect = "Select * from lop where tenlop = '$lop'";
        $result = mysqli_query($conn,$sqlSelect);
        $row = mysqli_fetch_row($result);
        $siso = $row[5]+1;
        $sqlUpdate = "Update lop set siso ='$siso' where tenlop = '$lop'";
        mysqli_query($conn,$sqlUpdate);
        $sqlInsert = "Insert into hocvien(`tk`, `mk`, `hoten`, `ngaysinh`, `gioitinh`, `sdt`, `gmail`, `lop`) values('$taikhoan','$matkhau','$hoten','$ngaysinh','$gioitinh','$sodienthoai','$gmail','$lop')";
        mysqli_query($conn, $sqlInsert) or die("Lỗi truy vẫn");
    }
    if (isset($_GET["tenlop"])){
        $tenlop = $_GET["tenlop"];
        $khaigiang = $_GET["khaigiang"];
        $doituong = $_GET["doituong"];
        $phonghoc = $_GET["phonghoc"];
        $cahoc = $_GET["cahoc"];
        $giaovien = $_GET["giaovien"];
        $siso = 0;
        $sqlInsert = "Insert into lop(`tenlop`, `giaovien`, `phonghoc`, `khaigiang`, `doituong`, `cahoc`, `siso`) values('$tenlop','$giaovien','$phonghoc','$khaigiang','$doituong','$cahoc',$siso)";
        mysqli_query($conn,$sqlInsert);
        $sqlSelect = "Select * from giaovien where hoten = '$giaovien'";
        $result = mysqli_query($conn,$sqlSelect);
        $row = mysqli_fetch_row($result);
        $taikhoan = $row[0];
        $lop = $tenlop.",".$row[8];
        $sqlUpdate = "Update giaovien set lop ='$lop' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
    }
?>


