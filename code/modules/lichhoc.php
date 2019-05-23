<?php
    include("kndatabase.php");
    if(isset($_GET["title"])){
        $title = $_GET["title"];
        $start = $_GET["start"];
        $lop = $_GET["lop"];
        $b = "";
        switch ($title){
            case 'BUỔI 1':{
                $b = "b1";
                break;
            }
            case 'BUỔI 2':{
                $b = "b2";
                break;
            }
            case 'BUỔI 3':{
                $b = "b3";
                break;
            }
            case 'BUỔI 4':{
                $b = "b4";
                break;
            }
            case 'BUỔI 5':{
                $b = "b5";
                break;
            }
            case 'BUỔI 6':{
                $b = "b6";
                break;
            }
            case 'BUỔI 7':{
                $b = "b7";
                break;
            }
            case 'BUỔI 8':{
                $b = "b8";
                break;
            }
            case 'BUỔI 9':{
                $b = "b9";
                break;
            }
            case 'BUỔI 10':{
                $b = "b10";
                break;
            }
            case 'BUỔI 11':{
                $b = "b11";
                break;
            }
            case 'BUỔI 12':{
                $b = "b12";
                break;
            }
            case 'BUỔI 13':{
                $b = "b13";
                break;
            }
            case 'BUỔI 14':{
                $b = "b14";
                break;
            }
            case 'BUỔI 15':{
                $b = "b15";
                break;
            }
            case 'BUỔI 16':{
                $b = "b16";
                break;
            }
            case 'BUỔI 17':{
                $b = "b17";
                break;
            }
            case 'BUỔI 18':{
                $b = "b18";
                break;
            }
            case 'BUỔI 19':{
                $b = "b19";
                break;
            }
            case 'BUỔI 20':{
                $b = "b20";
                break;
            }
        }
        $update = "update lop set $b ='$start' where tenlop='$lop'";
        mysqli_query($conn,$update);
    }
?>