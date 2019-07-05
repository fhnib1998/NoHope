<?php
    include("kndatabase.php");
    if(isset($_GET["batdau"])){
        $lop = $_GET['lop'];
        $batdau = $_GET['batdau'];
        $ketthuc = strtotime($_GET['ketthuc']);
        $buoi = $_GET["buoi"];
        $thu = explode(",",$_GET["thu"]);
        if(count($thu) == 1){
            $thu1 = $thu[0];
            while (strtotime($batdau) <= $ketthuc){
                $thufake = date("N",strtotime($batdau)) + 1;
                if($thufake == $thu1){
                    $sqlSelect = "select ngay from lichhoc where lop = '$lop' and buoi = $buoi";
                    if($row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect))){
                        $sqlUpdate = "update lichhoc set ngay = '$batdau' where lop = '$lop' and buoi = $buoi";
                        mysqli_query($conn,$sqlUpdate);
                    }else{
                        $sqlInsert = "insert into lichhoc(lop,buoi,ngay) values ('$lop',$buoi,'$batdau')";
                        mysqli_query($conn,$sqlInsert);
                    }
                    $buoi++;
                }
                $batdau = date("m/d/Y",strtotime('+1 day',strtotime($batdau)));
            }
        }elseif (count($thu) == 2){
            $thu1 = $thu[0];
            $thu2 = $thu[1];
            while (strtotime($batdau) <= $ketthuc){
                $thufake = date("N",strtotime($batdau)) + 1;
                if($thufake == $thu1||$thufake == $thu2){
                    $sqlSelect = "select ngay from lichhoc where lop = '$lop' and buoi = $buoi";
                    if($row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect))){
                        $sqlUpdate = "update lichhoc set ngay = '$batdau' where lop = '$lop' and buoi = $buoi";
                        mysqli_query($conn,$sqlUpdate);
                    }else{
                        $sqlInsert = "insert into lichhoc(lop,buoi,ngay) values ('$lop',$buoi,'$batdau')";
                        mysqli_query($conn,$sqlInsert);
                    }
                    $buoi++;
                }
                $batdau = date("m/d/Y",strtotime('+1 day',strtotime($batdau)));
            }
        }elseif (count($thu) == 3){
            $thu1 = $thu[0];
            $thu2 = $thu[1];
            $thu3 = $thu[2];
            while (strtotime($batdau) <= $ketthuc){
                $thufake = date("N",strtotime($batdau)) + 1;
                if($thufake == $thu1||$thufake == $thu2||$thufake == $thu3){
                    $sqlSelect = "select ngay from lichhoc where lop = '$lop' and buoi = $buoi";
                    if($row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect))){
                        $sqlUpdate = "update lichhoc set ngay = '$batdau' where lop = '$lop' and buoi = $buoi";
                        mysqli_query($conn,$sqlUpdate);
                    }else{
                        $sqlInsert = "insert into lichhoc(lop,buoi,ngay) values ('$lop',$buoi,'$batdau')";
                        mysqli_query($conn,$sqlInsert);
                    }
                    $buoi++;
                }
                $batdau = date("m/d/Y",strtotime('+1 day',strtotime($batdau)));
            }
        }else{
            $thu1 = $thu[0];
            $thu2 = $thu[1];
            $thu3 = $thu[2];
            $thu4 = $thu[3];
            while (strtotime($batdau) <= $ketthuc){
                $thufake = date("N",strtotime($batdau)) + 1;
                if($thufake == $thu1||$thufake == $thu2||$thufake == $thu3||$thufake == $thu4){
                    $sqlSelect = "select ngay from lichhoc where lop = '$lop' and buoi = $buoi";
                    if($row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect))){
                        $sqlUpdate = "update lichhoc set ngay = '$batdau' where lop = '$lop' and buoi = $buoi";
                        mysqli_query($conn,$sqlUpdate);
                    }else{
                        $sqlInsert = "insert into lichhoc(lop,buoi,ngay) values ('$lop',$buoi,'$batdau')";
                        mysqli_query($conn,$sqlInsert);
                    }
                    $buoi++;
                }
                $batdau = date("m/d/Y",strtotime('+1 day',strtotime($batdau)));
            }
        }

    }
    if(isset($_GET["title"])){
        $title = $_GET["title"];
        $start = $_GET["start"];
        $lop = $_GET["lop"];
        $b = "";
        switch ($title){
            case 'BUỔI 1':{
                $b = "1";
                break;
            }
            case 'BUỔI 2':{
                $b = "2";
                break;
            }
            case 'BUỔI 3':{
                $b = "3";
                break;
            }
            case 'BUỔI 4':{
                $b = "4";
                break;
            }
            case 'BUỔI 5':{
                $b = "5";
                break;
            }
            case 'BUỔI 6':{
                $b = "6";
                break;
            }
            case 'BUỔI 7':{
                $b = "7";
                break;
            }
            case 'BUỔI 8':{
                $b = "8";
                break;
            }
            case 'BUỔI 9':{
                $b = "9";
                break;
            }
            case 'BUỔI 10':{
                $b = "10";
                break;
            }
            case 'BUỔI 11':{
                $b = "11";
                break;
            }
            case 'BUỔI 12':{
                $b = "12";
                break;
            }
            case 'BUỔI 13':{
                $b = "13";
                break;
            }
            case 'BUỔI 14':{
                $b = "14";
                break;
            }
            case 'BUỔI 15':{
                $b = "15";
                break;
            }
            case 'BUỔI 16':{
                $b = "16";
                break;
            }
            case 'BUỔI 17':{
                $b = "17";
                break;
            }
            case 'BUỔI 18':{
                $b = "18";
                break;
            }
            case 'BUỔI 19':{
                $b = "19";
                break;
            }
            case 'BUỔI 20':{
                $b = "20";
                break;
            }
            case 'BUỔI 21':{
                $b = "21";
                break;
            }
            case 'BUỔI 22':{
                $b = "22";
                break;
            }
            case 'BUỔI 23':{
                $b = "23";
                break;
            }
            case 'BUỔI 24':{
                $b = "24";
                break;
            }
            case 'BUỔI 25':{
                $b = "25";
                break;
            }
            case 'BUỔI 26':{
                $b = "26";
                break;
            }
            case 'BUỔI 27':{
                $b = "27";
                break;
            }
            case 'BUỔI 28':{
                $b = "28";
                break;
            }
            case 'BUỔI 29':{
                $b = "29";
                break;
            }
            case 'BUỔI 30':{
                $b = "30";
                break;
            }
            case 'BUỔI 31':{
                $b = "31";
                break;
            }
            case 'BUỔI 32':{
                $b = "32";
                break;
            }
            case 'BUỔI 33':{
                $b = "33";
                break;
            }
            case 'BUỔI 34':{
                $b = "34";
                break;
            }
            case 'BUỔI 35':{
                $b = "35";
                break;
            }
            case 'BUỔI 36':{
                $b = "36";
                break;
            }
            case 'BUỔI 37':{
                $b = "37";
                break;
            }
            case 'BUỔI 38':{
                $b = "38";
                break;
            }
            case 'BUỔI 39':{
                $b = "39";
                break;
            }
            case 'BUỔI 40':{
                $b = "40";
                break;
            }
            case 'BUỔI 41':{
                $b = "41";
                break;
            }
            case 'BUỔI 42':{
                $b = "42";
                break;
            }
            case 'BUỔI 43':{
                $b = "43";
                break;
            }
            case 'BUỔI 44':{
                $b = "44";
                break;
            }
            case 'BUỔI 45':{
                $b = "45";
                break;
            }
            case 'BUỔI 46':{
                $b = "46";
                break;
            }
            case 'BUỔI 47':{
                $b = "47";
                break;
            }
            case 'BUỔI 48':{
                $b = "48";
                break;
            }
            case 'BUỔI 49':{
                $b = "49";
                break;
            }
            case 'BUỔI 50':{
                $b = "50";
                break;
            }
            case 'BUỔI 51':{
                $b = "51";
                break;
            }
            case 'BUỔI 52':{
                $b = "52";
                break;
            }
            case 'BUỔI 53':{
                $b = "53";
                break;
            }
            case 'BUỔI 54':{
                $b = "54";
                break;
            }
            case 'BUỔI 55':{
                $b = "55";
                break;
            }
            case 'BUỔI 56':{
                $b = "56";
                break;
            }
            case 'BUỔI 57':{
                $b = "57";
                break;
            }
            case 'BUỔI 58':{
                $b = "58";
                break;
            }
            case 'BUỔI 59':{
                $b = "59";
                break;
            }
            case 'BUỔI 60':{
                $b = "60";
                break;
            }
            case 'BUỔI 61':{
                $b = "61";
                break;
            }
            case 'BUỔI 62':{
                $b = "62";
                break;
            }
            case 'BUỔI 63':{
                $b = "63";
                break;
            }
            case 'BUỔI 64':{
                $b = "64";
                break;
            }
            case 'BUỔI 65':{
                $b = "65";
                break;
            }
            case 'BUỔI 66':{
                $b = "66";
                break;
            }
            case 'BUỔI 67':{
                $b = "67";
                break;
            }
            case 'BUỔI 68':{
                $b = "68";
                break;
            }
            case 'BUỔI 69':{
                $b = "69";
                break;
            }
            case 'BUỔI 70':{
                $b = "70";
                break;
            }
            case 'BUỔI 71':{
                $b = "71";
                break;
            }
            case 'BUỔI 72':{
                $b = "72";
                break;
            }
            case 'BUỔI 73':{
                $b = "73";
                break;
            }
            case 'BUỔI 74':{
                $b = "74";
                break;
            }
            case 'BUỔI 75':{
                $b = "75";
                break;
            }
            case 'BUỔI 76':{
                $b = "76";
                break;
            }
            case 'BUỔI 77':{
                $b = "77";
                break;
            }
            case 'BUỔI 78':{
                $b = "78";
                break;
            }
            case 'BUỔI 79':{
                $b = "79";
                break;
            }
            case 'BUỔI 80':{
                $b = "80";
                break;
            }
            case 'BUỔI 81':{
                $b = "81";
                break;
            }
            case 'BUỔI 82':{
                $b = "82";
                break;
            }
            case 'BUỔI 83':{
                $b = "83";
                break;
            }
            case 'BUỔI 84':{
                $b = "84";
                break;
            }
            case 'BUỔI 85':{
                $b = "85";
                break;
            }
            case 'BUỔI 86':{
                $b = "86";
                break;
            }
            case 'BUỔI 87':{
                $b = "87";
                break;
            }
            case 'BUỔI 88':{
                $b = "88";
                break;
            }
            case 'BUỔI 89':{
                $b = "89";
                break;
            }
            case 'BUỔI 90':{
                $b = "90";
                break;
            }
            case 'BUỔI 91':{
                $b = "91";
                break;
            }
            case 'BUỔI 92':{
                $b = "92";
                break;
            }
            case 'BUỔI 93':{
                $b = "93";
                break;
            }
            case 'BUỔI 94':{
                $b = "94";
                break;
            }
            case 'BUỔI 95':{
                $b = "95";
                break;
            }
            case 'BUỔI 96':{
                $b = "96";
                break;
            }
            case 'BUỔI 97':{
                $b = "97";
                break;
            }
            case 'BUỔI 98':{
                $b = "98";
                break;
            }
            case 'BUỔI 99':{
                $b = "99";
                break;
            }
            case 'BUỔI 100':{
                $b = "100";
                break;
            }
            case 'BUỔI 101':{
                $b = "101";
                break;
            }
            case 'BUỔI 102':{
                $b = "102";
                break;
            }
            case 'BUỔI 103':{
                $b = "103";
                break;
            }
            case 'BUỔI 104':{
                $b = "104";
                break;
            }
            case 'BUỔI 105':{
                $b = "105";
                break;
            }
            case 'BUỔI 106':{
                $b = "106";
                break;
            }
            case 'BUỔI 107':{
                $b = "107";
                break;
            }
            case 'BUỔI 108':{
                $b = "108";
                break;
            }
            case 'BUỔI 109':{
                $b = "109";
                break;
            }
            case 'BUỔI 110':{
                $b = "110";
                break;
            }
            case 'BUỔI 111':{
                $b = "111";
                break;
            }
            case 'BUỔI 112':{
                $b = "112";
                break;
            }
            case 'BUỔI 113':{
                $b = "113";
                break;
            }
            case 'BUỔI 114':{
                $b = "114";
                break;
            }
            case 'BUỔI 115':{
                $b = "115";
                break;
            }
            case 'BUỔI 116':{
                $b = "116";
                break;
            }
            case 'BUỔI 117':{
                $b = "117";
                break;
            }
            case 'BUỔI 118':{
                $b = "118";
                break;
            }
            case 'BUỔI 119':{
                $b = "119";
                break;
            }
            case 'BUỔI 120':{
                $b = "120";
                break;
            }
        }
        $sqlUpdate = "update lichhoc set ngay ='$start' where lop='$lop' and buoi = '$b'";
        mysqli_query($conn,$sqlUpdate);
    }
?>