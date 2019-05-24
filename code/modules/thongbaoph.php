<?php
    include ("kndatabase.php");
    include ("../../assets/PHPMailer/PHPMailerAutoload.php");
    $lop = $_GET["lop"];
    $b = $_GET["b"];
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
    $mail->Subject = "Thông báo học viên nghỉ học lớp ".$lop;
    $sqlSelect = "select * from hocvien where lop = '$lop'";
    $result = mysqli_query($conn,$sqlSelect);
    while ($row = mysqli_fetch_assoc($result)){
        if($row[$b] != 1){
            $nghi = $row["nghi"]+1;
            $taikhoan = $row["tk"];
            $sqlUpdate = "update hocvien set nghi = $nghi where tk = '$taikhoan'";
            mysqli_query($conn,$sqlUpdate);
            $mail->Body = "No Hope Center xin thông báo:<br> Học viên <b>".$row["hoten"]."</b> đã nghỉ buổi <b>".strtoupper($b)."</b>.Tổng số buổi nghỉ là <b>$nghi</b> buổi.Chúng tôi thông báo để phụ huynh biết tình hình đi học của con em mình.<br>Trân trọng thông báo,<br><b>No Hope Center</b>";
            $mail->addAddress($row["gmail"]);
            $mail->send();
        }
    }
