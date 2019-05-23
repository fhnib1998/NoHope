<?php
    include ("kndatabase.php");
    if(isset($_GET["tkgv"])){
        $taikhoan = $_GET["tkgv"];
        $sqlDelete = "delete from giaovien where tk = '$taikhoan'";
        mysqli_query($conn, $sqlDelete);
        header("location:admin_giaovien.php");
    }
    if(isset($_GET["tkhv"])){
        $taikhoan = $_GET["tkhv"];
        $sqlDelete = "delete from hocvien where tk = '$taikhoan'";
        mysqli_query($conn, $sqlDelete);
    }
    if(isset($_GET["tenlop"])){
        $tenlop = $_GET["tenlop"];
        $sqlSelect = "Select * from giaovien where lop like '%$tenlop%'";
        $result = mysqli_query($conn,$sqlSelect);
        $row = mysqli_fetch_row($result);
        $taikhoan = $row[0];
        $lop = $row[8];
        $lopmoi = str_replace("$tenlop,","","$lop");
        $sqlUpdate = "Update giaovien set lop ='$lopmoi' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlDelete = "delete from lop where tenlop = '$tenlop'";
        mysqli_query($conn, $sqlDelete);
    }
?>