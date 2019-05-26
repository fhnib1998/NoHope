<?php
    include("kndatabase.php");
    $tk = $_GET["tk"];
    $mk = $_GET["mk"];
    $sqlSelect = "Select * from thanhvien where tk = '$tk' and mk = '$mk'";
    $result = mysqli_query($conn,$sqlSelect);
    if($row = mysqli_fetch_row($result)){
        if($row[2] == "gv"){
            echo 3;
        }elseif ($row[2] == "hv"){
            echo 4;
        }else{
            echo 2;
        }
    }
?>

