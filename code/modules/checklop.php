<?php
    include("kndatabase.php");
    if(isset($_GET["tenlop"])){
        $tenlop = $_GET["tenlop"];
        $sqlSelect = "Select * from lop where tenlop = '$tenlop'";
        $result = mysqli_query($conn,$sqlSelect) or die("Lỗi truy vấn");
        if(mysqli_num_rows($result)!=0){
            echo "1";
        }
        else{
            echo "0";
        }
    }
    if(isset($_GET["tkhv"])){
        $tk = $_GET["tkhv"];
        $lop = $_GET["lop"];
        $sqlSelectHV = "select lop from hocvien where tk='$tk'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelectHV));
        $lopHV = $row[0];
        if(strlen(strstr($lopHV,$lop)) > 0){
            echo "1";
        }else{
            echo "0";
        }
    }
?>
