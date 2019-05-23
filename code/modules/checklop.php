<?php
include("kndatabase.php");
$tenlop = $_GET["tenlop"];
$sqlSelect = "Select * from lop where tenlop = '$tenlop'";
$result = mysqli_query($conn,$sqlSelect) or die("Lỗi truy vấn");
if(mysqli_num_rows($result)!=0){
    echo "1";
}
else{
    echo "0";
}
?>
