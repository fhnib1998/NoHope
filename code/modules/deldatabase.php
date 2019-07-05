<?php
    include ("kndatabase.php");
    if(isset($_GET["tkgv"])){
        $taikhoan = $_GET["tkgv"];
        $sqlDelete = "delete from giaovien where tk = '$taikhoan'";
        mysqli_query($conn,$sqlDelete);
        $sqlDeleteTV = "delete from thanhvien where tk = '$taikhoan'";
        mysqli_query($conn,$sqlDeleteTV);
    }
    if(isset($_GET["tkhv"])){
        $taikhoan = $_GET["tkhv"];
        $lop = $_GET["lop"];
        $sqlSelectLop = "select siso from lop where tenlop = '$lop'";
        $rowLop = mysqli_fetch_row(mysqli_query($conn,$sqlSelectLop));
        $siso = $rowLop[0] - 1;
        $sqlUpdate = "update lop set siso = $siso where tenlop = '$lop'";
        mysqli_query($conn,$sqlUpdate);
        $sqlSelectHV = "select lop from hocvien where tk = '$taikhoan'";
        $rowHV = mysqli_fetch_row(mysqli_query($conn,$sqlSelectHV));
        $lopC = $rowHV[0];
        $lopmoi = str_replace(" $lop","","$lopC");
        $sqlUpdateHV = "Update hocvien set lop ='$lopmoi' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdateHV);
    }
    if(isset($_GET["tenlop"])){
        $tenlop = $_GET["tenlop"];
        $sqlSelect = "Select tk,lop from giaovien where lop like '%$tenlop%'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect));
        $taikhoan = $row[0];
        $lop = $row[1];
        $lopmoi = str_replace("$tenlop,","","$lop");
        $sqlUpdate = "Update giaovien set lop ='$lopmoi' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlDelete = "delete from lop where tenlop = '$tenlop'";
        mysqli_query($conn, $sqlDelete);
    }
    if(isset($_GET["anh"])){
        $anh = $_GET["anh"];
        $sqlDelete = "delete from khoahoc where image = '$anh'";
        mysqli_query($conn, $sqlDelete);
    }
?>