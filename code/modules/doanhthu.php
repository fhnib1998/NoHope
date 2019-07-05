<?php
    include ("kndatabase.php");
    include ("../../assets/PHPMailer/PHPMailerAutoload.php");
    if(isset($_GET["tkhv"])){
        $lop = $_GET["lop"];
        $tk = $_GET["tkhv"];
        $tienf = $_GET["tien"];
        $tien = str_replace(",","","$tienf");
        $sqlSelectHV = "select hoten,gmail,nop,chuanop from hocvien where tk='$tk'";
        $rowHV = mysqli_fetch_row(mysqli_query($conn,$sqlSelectHV));
        $hocvien = $rowHV[0];
        $nop = $rowHV[2] + $tien;
        $chuanop = $rowHV[3] - $tien;
        $sqlUpdateHV = "update hocvien set nop = $nop,chuanop = $chuanop where tk = '$tk'";
        mysqli_query($conn,$sqlUpdateHV);
        $ngay = date("m/d/Y");
        $thang = date("m/Y");
        $sqlSelect = "select thu from doanhthu where thang = '$thang'";
        $result = mysqli_query($conn,$sqlSelect);
        if($row = mysqli_fetch_row($result)){
            $thu = $row[0] + $tien;
            $sqlUpdate = "update doanhthu set thu = $thu where thang = '$thang'";
            mysqli_query($conn,$sqlUpdate);
            $noidung = "Học viên ".$hocvien." nộp";
            $sqlInsert = "insert into thongke(thang,ngay,noidung,lop,tien,trangthai) values('$thang','$ngay','$noidung','$lop',$tien,'Thu')";
            mysqli_query($conn,$sqlInsert);
        }
        else{
            $sqlInsert = "insert into doanhthu(thang,thu) values('$thang',$tien)";
            mysqli_query($conn,$sqlInsert);
            $noidung = "Học viên ".$hocvien." nộp";
            $sqlInsert = "insert into thongke(thang,ngay,noidung,lop,tien,trangthai) values('$thang','$ngay','$noidung','$lop',$tien,'Thu')";
            mysqli_query($conn,$sqlInsert);
        }
        $sqlSelectHL = "select nop,chuanop from hocvienlop where tk='$tk' and lop='$lop'";
        $rowHL = mysqli_fetch_row(mysqli_query($conn,$sqlSelectHL));
        $nopHL = $rowHL[0] + $tien;
        $chuanopHL = $rowHL[1] - $tien;
        $sqlUpdateHL = "update hocvienlop set nop = $nopHL,chuanop = $chuanopHL where tk = '$tk' and lop='$lop'";
        mysqli_query($conn,$sqlUpdateHL);
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "587";
        $mail->setFrom("fhnibkma@gmail.com","No Hope Center");
        $mail->Username = "fhnibkma@gmail.com";
        $mail->Password = "Lucifer98";
        $mail->isHTML(true);
        $mail->CharSet = "utf-8";
        $mail->Subject = "Thông báo thanh toán online";
        $mail->Body = "No Hope Center xin thông báo:<br>Học viên $rowHV[0] đã nộp cho trung tâm lớp $lop: $tien đ.Số tiền chưa đóng là $chuanop đ<br>Trân trọng thông báo,<br><b>No Hope Center</b>";
        $mail->addAddress($rowHV[1]);
        $mail->send();
    }
    if(isset($_GET["tkgv"])){
        $tk = $_GET["tkgv"];
        $tien = $_GET["tien"];
        $sqlSelectGV = "select hoten,datra from giaovien where tk='$tk'";
        $rowGV = mysqli_fetch_row(mysqli_query($conn,$sqlSelectGV));
        $giaovien = $rowGV[0];
        $chuatra = 0;
        $datra = $rowGV[1] + $tien;
        $sqlUpdateGV = "update giaovien set chuatra = $chuatra,datra = $datra where tk = '$tk'";
        mysqli_query($conn,$sqlUpdateGV);
        $ngay = date("m/d/Y");
        $thang = date("m/Y");
        $sqlSelect = "select chi from doanhthu where thang = '$thang'";
        $result = mysqli_query($conn,$sqlSelect);
        if($row = mysqli_fetch_row($result)){
            $chi = $row[0] + $tien;
            $sqlUpdate = "update doanhthu set chi = $chi where thang = '$thang'";
            mysqli_query($conn,$sqlUpdate);
            $noidung = "Trả lương giáo viên ".$giaovien;
            $sqlInsert = "insert into thongke(thang,ngay,noidung,tien,trangthai) values('$thang','$ngay','$noidung',$tien,'Chi')";
            mysqli_query($conn,$sqlInsert);
        }
        else{
            $sqlInsert = "insert into doanhthu(thang,chi) values('$thang',$tien)";
            mysqli_query($conn,$sqlInsert);
            $noidung = "Trả lương giáo viên ".$giaovien;
            $sqlInsert = "insert into thongke(thang,ngay,noidung,tien,trangthai) values('$thang','$ngay','$noidung',$tien,'Chi')";
            mysqli_query($conn,$sqlInsert);
        }
    }