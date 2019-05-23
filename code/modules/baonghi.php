<?php
    include ("kndatabase.php");
    include ("../../assets/PHPMailer/PHPMailerAutoload.php");
    $lop = $_GET["lop"];
    $b = $_GET["b"];
    $ngaynghi = $_GET["ngaynghi"];
    $lido = $_GET["lido"];
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
    $mail->Subject = "Thông báo nghỉ học lớp ".$lop;
    $sqlSelect = "select * from hocvien where lop = '$lop'";
    $result = mysqli_query($conn,$sqlSelect);
    while ($row = mysqli_fetch_assoc($result)){
        $mail->Body = "<b>No Hope Center</b> xin thông báo:<br>$b lớp $lop ngày $ngaynghi, học viên được nghỉ.<br>Lí do: $lido.<br>Chúng tôi thông báo để phụ huynh và học viên biết thông tin nghỉ học.<br>Trân trọng thông báo,<br><b>No Hope Center</b>";
        $mail->addAddress($row["gmail"]);
        $mail->send();
    }
