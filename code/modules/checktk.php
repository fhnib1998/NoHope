<?php
    include("kndatabase.php");
    if(isset($_GET["tk"])){
        $tk = $_GET["tk"];
        $sqlSelect = "Select * from thanhvien where tk = '$tk'";
        $result = mysqli_query($conn,$sqlSelect) or die("Lỗi truy vấn");
        if(mysqli_num_rows($result)!=0){
            echo "1";
        }
        else{
            echo "0";
        }
    }
?>

