<?php
    include ("kndatabase.php");
    include ("../../assets/PHPMailer/PHPMailerAutoload.php");
    if(isset($_GET["tkhv"])){
        $tk = $_GET["tkhv"];
        $tien = $_GET["tien"];
        $sqlSelectHV = "select hoten,lop,gmail,hoc,nop,chuanop from hocvien where tk='$tk'";
        $rowHV = mysqli_fetch_row(mysqli_query($conn,$sqlSelectHV));
        $hocvien = $rowHV[0];
        $lop = $rowHV[1];
        $nop = $rowHV[4] + $tien;
        if($rowHV[5]>=0){
            $chuanop = $rowHV[5]-$tien;
        }else{
            $chuanop = $rowHV[5]+$tien;
        }
        $sqlUpdateHV = "update hocvien set nop = $nop,chuanop = $chuanop where tk = '$tk'";
        mysqli_query($conn,$sqlUpdateHV);
        $ngay = date("d/m/Y");
        $thang = date("m/Y");
        $sqlSelect = "select * from doanhthu where thang = '$thang'";
        $result = mysqli_query($conn,$sqlSelect);
        if($row = mysqli_fetch_row($result)){
            $thu = $row[1] + $tien;
            $sqlUpdate = "update doanhthu set thu = $thu where thang = '$thang'";
            mysqli_query($conn,$sqlUpdate);
            $noidung = "Học viên ".$hocvien." lớp ".$lop." nộp";
            $sqlInsert = "insert into thongke(thang,ngay,noidung,tien) values('$thang','$ngay','$noidung',$tien)";
            mysqli_query($conn,$sqlInsert);
        }
        else{
            $sqlInsert = "insert into doanhthu(thang,thu) values('$thang',$tien)";
            mysqli_query($conn,$sqlInsert);
            $noidung = "Học viên ".$hocvien." lớp ".$lop." nộp";
            $sqlInsert = "insert into thongke(thang,ngay,noidung,tien) values('$thang','$ngay','$noidung',$tien)";
            mysqli_query($conn,$sqlInsert);
        }
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
        $mail->Body = "No Hope Center xin thông báo:<br>Học viên $rowHV[0] đã nộp cho trung tâm: $tien đ.Số tiền chưa đóng là $chuanop đ<br>Trân trọng thông báo,<br><b>No Hope Center</b>";
        $mail->addAddress($rowHV[2]);
        $mail->send();
    }
    if(isset($_GET["tkgv"])){
        $tk = $_GET["tkgv"];
        $tien = $_GET["tien"];
        $sqlSelectHV = "select hoten,chuatra from giaovien where tk='$tk'";
        $rowGV = mysqli_fetch_row(mysqli_query($conn,$sqlSelectHV));
        $giaovien = $rowGV[0];
        $chuatra = 0;
        $sqlUpdateGV = "update giaovien set chuatra = $chuatra where tk = '$tk'";
        mysqli_query($conn,$sqlUpdateHV);
        $ngay = date("d/m/Y");
        $thang = date("m/Y");
        $sqlSelect = "select * from doanhthu where thang = '$thang'";
        $result = mysqli_query($conn,$sqlSelect);
        if($row = mysqli_fetch_row($result)){
            $chi = $row[2] + $tien;
            $sqlUpdate = "update doanhthu set chi = $chi where thang = '$thang'";
            mysqli_query($conn,$sqlUpdate);
            $noidung = "Trả lương giáo viên ".$giaovien;
            $sqlInsert = "insert into thongke(thang,ngay,noidung,tien) values('$thang','$ngay','$noidung',$tien)";
            mysqli_query($conn,$sqlInsert);
        }
        else{
            $sqlInsert = "insert into doanhthu(thang,chi) values('$thang',$tien)";
            mysqli_query($conn,$sqlInsert);
            $noidung = "Trả lương giáo viên ".$giaovien;
            $sqlInsert = "insert into thongke(thang,ngay,noidung,tien) values('$thang','$ngay','$noidung',$tien)";
            mysqli_query($conn,$sqlInsert);
        }
    }