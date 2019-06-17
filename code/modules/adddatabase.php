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
        $sotk = $_GET["sotk"];
        $avatar_name = $_GET["avatar"];
        $avatar = "../uploads/".$avatar_name;
        $sqlInsert = "Insert into giaovien(tk,mk,hoten,ngaysinh,gioitinh,sdt,trinhdo,avatar,sotk) values('$taikhoan','$matkhau','$hoten','$ngaysinh','$gioitinh','$sodienthoai','$trinhdo','$avatar','$sotk')";
        mysqli_query($conn, $sqlInsert);
        $sqlInsertTV = "insert into thanhvien(tk,mk,quyen) values('$taikhoan','$matkhau','gv') ";
        mysqli_query($conn,$sqlInsertTV);
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
        $hocphi = $_GET["hocphi"];
        $sqlSelect = "Select siso from lop where tenlop = '$lop'";
        $result = mysqli_query($conn,$sqlSelect);
        $row = mysqli_fetch_row($result);
        $siso = $row[0]+1;
        $sqlUpdate = "update lop set siso ='$siso' where tenlop = '$lop'";
        mysqli_query($conn,$sqlUpdate);
        $sqlInsert = "insert into hocvien(tk,mk,hoten,ngaysinh,gioitinh,sdt,gmail,lop,hocphi) values('$taikhoan','$matkhau','$hoten','$ngaysinh','$gioitinh','$sodienthoai','$gmail','$lop',$hocphi)";
        mysqli_query($conn, $sqlInsert) or die("Lỗi truy vẫn");
        $sqlInsertTV = "insert into thanhvien(tk,mk,quyen) values('$taikhoan','$matkhau','hv') ";
        mysqli_query($conn,$sqlInsertTV);
    }
    if (isset($_GET["tenlop"])){
        $tenlop = $_GET["tenlop"];
        $khaigiang = $_GET["khaigiang"];
        $doituong = $_GET["doituong"];
        $phonghoc = $_GET["phonghoc"];
        $cahoc = $_GET["cahoc"];
        $giaovien = $_GET["giaovien"];
        $hocphi = $_GET["hocphi"];
        $luong = $_GET["luong"];
        $siso = 0;
        $sqlInsert = "Insert into lop(tenlop, giaovien, phonghoc, khaigiang, doituong, cahoc, siso, hocphi,luong) values('$tenlop','$giaovien','$phonghoc','$khaigiang','$doituong','$cahoc',$siso,$hocphi,$luong)";
        mysqli_query($conn,$sqlInsert);
        $sqlSelect = "Select tk,lop from giaovien where hoten = '$giaovien'";
        $result = mysqli_query($conn,$sqlSelect);
        $row = mysqli_fetch_row($result);
        $taikhoan = $row[0];
        $lop = $tenlop.", ".$row[1];
        $sqlUpdate = "Update giaovien set lop ='$lop' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
    }
    if (isset($_GET["anh"])){
        $image_name = $_GET['anh'];
        $image = "../uploads/".$image_name;
        $sqlInsert = "insert into khoahoc(image) values ('$image')";
        mysqli_query($conn,$sqlInsert);
    }
?>


