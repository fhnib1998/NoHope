<?php
    include ("kndatabase.php");
    include ("../../assets/PHPMailer/PHPMailerAutoload.php");
    $hoten = $_GET["hoten"];
    $sdt = $_GET["sdt"];
    $email = $_GET["email"];
    $loinhan = $_GET["loinhan"];
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->setFrom("dangkituvan@gmail.com","Chăm sóc khách hàng");
    $mail->Username = "dangkituvan@gmail.com";
    $mail->Password = "Lucifer!@#";
    $mail->isHTML(true);
    $mail->CharSet = "utf-8";
    $mail->Subject = "Đăng kí tư vấn";
    $mail->Body = "Khách hàng cần tư vấn:<br>- Họ tên: $hoten<br>- Số điện thoại: $sdt<br>- Email: $email<br>- Lời nhắn: $loinhan";
    $mail->addAddress("fhnibkma@gmail.com");
    $mail->send();
?>
