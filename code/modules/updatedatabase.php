<?php
    session_start();
    include ("kndatabase.php");
    include ("../../assets/PHPMailer/PHPMailerAutoload.php");
    if(isset($_GET["tk"])){
        $taikhoan = $_GET["tk"];
        $matkhau = $_GET["mk"];
        $sqlUpdate = "update giaovien set mk='$matkhau'where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlUpdate = "update hocvien set mk='$matkhau'where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlUpdateTV = "update thanhvien set mk ='$matkhau' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdateTV);
    }
    if(isset($_GET["tkgv"])){
        $taikhoan = $_GET["tkgv"];
        $hoten = $_GET["hoten"];
        $ngaysinh = $_GET["ngaysinh"];
        $gioitinh = $_GET["gioitinh"];
        $sodienthoai = $_GET["sodienthoai"];
        $sotk = $_GET["sotk"];
        $avatar_name = $_GET["avatar"];
        $avatar = "../uploads/".$avatar_name;
        $_SESSION['hoten']= $hoten;
        $_SESSION['ngaysinh']= $ngaysinh;
        $_SESSION['gioitinh']= $gioitinh;
        $_SESSION['sdt']= $sodienthoai;
        $_SESSION['avatar']= $avatar;
        if($avatar_name != ""){
            $sqlUpdate = "UPDATE giaovien SET hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sodienthoai',sotk='$sotk',avatar='$avatar' WHERE tk='$taikhoan'";
            mysqli_query($conn,$sqlUpdate) or die("Lỗi truy vấn");
        }else{
            $sqlUpdate = "UPDATE giaovien SET hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sodienthoai',sotk='$sotk' WHERE tk='$taikhoan'";
            mysqli_query($conn,$sqlUpdate) or die("Lỗi truy vấn");
        }
    }
    if(isset($_GET["tkgvad"])){
        $taikhoan = $_GET["tkgvad"];
        $matkhau = $_GET["mk"];
        $hoten = $_GET["hoten"];
        $ngaysinh = $_GET["ngaysinh"];
        $gioitinh = $_GET["gioitinh"];
        $sodienthoai = $_GET["sodienthoai"];
        $trinhdo = $_GET["trinhdo"];
        $sotk = $_GET["sotk"];
        $avatar_name = $_GET["avatar"];
        $avatar = "../uploads/".$avatar_name;
        if($avatar_name != ""){
            $sqlUpdate = "UPDATE giaovien SET mk = '$matkhau',hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sodienthoai',trinhdo='$trinhdo',avatar='$avatar',sotk='$sotk' WHERE tk='$taikhoan'";
            mysqli_query($conn,$sqlUpdate) or die("Lỗi truy vấn");
        }else{
            $sqlUpdate = "UPDATE giaovien SET mk = '$matkhau',hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sodienthoai',trinhdo='$trinhdo',sotk='$sotk' WHERE tk='$taikhoan'";
            mysqli_query($conn,$sqlUpdate) or die("Lỗi truy vấn");
        }
        $sqlUpdateTV = "update thanhvien set mk ='$matkhau' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdateTV);
    }
    if(isset($_GET["tkhv"])){
        $taikhoan = $_GET["tkhv"];
        $hoten = $_GET["hoten"];
        $ngaysinh = $_GET["ngaysinh"];
        $gioitinh = $_GET["gioitinh"];
        $sdt = $_GET["sdt"];
        $gmail = $_GET["gmail"];
        $avatar_name = $_GET["avatar"];
        $avatar = "../uploads/".$avatar_name;
        $_SESSION['hoten']= $hoten;
        $_SESSION['ngaysinh']= $ngaysinh;
        $_SESSION['gioitinh']= $gioitinh;
        $_SESSION['sdt']= $sdt;
        $_SESSION['gmail']= $gmail;
        $_SESSION['avatar']= $avatar;
        if($avatar_name != ""){
            $sqlUpdate = "update hocvien set hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',gmail='$gmail',avatar='$avatar' where tk = '$taikhoan'";
            mysqli_query($conn,$sqlUpdate);
        }else{
            $sqlUpdate = "update hocvien set hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',gmail='$gmail' where tk = '$taikhoan'";
            mysqli_query($conn,$sqlUpdate);
        }
    }
    if(isset($_GET["tkhvad"])){
        $taikhoan = $_GET["tkhvad"];
        $matkhau = $_GET['mk'];
        $hoten = $_GET["hoten"];
        $ngaysinh = $_GET["ngaysinh"];
        $gioitinh = $_GET["gioitinh"];
        $sdt = $_GET["sdt"];
        $gmail = $_GET["gmail"];
        $giamgia = $_GET["giamgia"];
        $sqlUpdate = "update hocvien set mk='$matkhau',hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',gmail='$gmail',giamgia=$giamgia where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlUpdateTV = "update thanhvien set mk ='$matkhau' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdateTV);
    }
    if(isset($_GET["tenlop"])){
        $tenlop = $_GET["tenlop"];
        $khaigiang = $_GET["khaigiang"];
        $phonghoc = $_GET["phonghoc"];
        $cahoc = $_GET["cahoc"];
        $doituong = $_GET["doituong"];
        $hocphi = $_GET["hocphi"];
        $luong = $_GET["luong"];
        $giaovien = $_GET["giaovien"];
        $sqlSelectLop = "select giaovien from lop where tenlop = '$tenlop'";
        $rowLop = mysqli_fetch_row(mysqli_query($conn,$sqlSelectLop));
        $giaovienC = $rowLop[0];
        if($giaovienC == $giaovien|| $giaovien == ""){
            $sqlUpdate = "update lop set khaigiang='$khaigiang',phonghoc='$phonghoc',cahoc='$cahoc',doituong='$doituong',hocphi = $hocphi,luong=$luong where tenlop = '$tenlop'";
        }else{
            $sqlUpdate = "update lop set khaigiang='$khaigiang',giaovien='$giaovien',phonghoc='$phonghoc',cahoc='$cahoc',doituong='$doituong',hocphi = $hocphi,luong=$luong where tenlop = '$tenlop'";
            $sqlSelectGVC = "Select tk,lop from giaovien where hoten = '$giaovienC'";
            $rowC = mysqli_fetch_row(mysqli_query($conn,$sqlSelectGVC));
            $taikhoanC = $rowC[0];
            $lop = $rowC[1];
            $lopC = str_replace("$tenlop,","","$lop");
            $sqlUpdateC = "Update giaovien set lop ='$lopC' where tk = '$taikhoanC'";
            mysqli_query($conn,$sqlUpdateC);
            $sqlSelectGVM = "Select tk,lop from giaovien where hoten = '$giaovien'";
            $rowM = mysqli_fetch_row(mysqli_query($conn,$sqlSelectGVM));
            $taikhoanM = $rowM[0];
            $lopM = $tenlop.", ".$rowM[1];
            $sqlUpdateM = "Update giaovien set lop ='$lopM' where tk = '$taikhoanM'";
            mysqli_query($conn,$sqlUpdateM);
        }
        mysqli_query($conn,$sqlUpdate);
    }
    if(isset($_GET["tkdd1"])){
        $taikhoan = $_GET["tkdd1"];
        $b = $_GET["b"];
        $sqlSelect = "select hoc,hocphi,chuanop,giamgia from hocvien where tk = '$taikhoan'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect));
        $hoc = $row[0] + 1;
        $chuanop = $row[2]+ $row[1] - $row[1]*$row[3]/100;
        $sqlUpdate = "update hocvien set $b = 1,hoc = $hoc,chuanop = $chuanop where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
    }
    if(isset($_GET["tkdd0"])){
        $taikhoan = $_GET["tkdd0"];
        $b = $_GET["b"];
        $sqlSelect = "select nghi,gmail,hoten from hocvien where tk = '$taikhoan'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect));
        $nghi = $row[0] + 1;
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
        $mail->Subject = "Thông báo học viên nghỉ học";
        $mail->Body = "No Hope Center xin thông báo:<br> Học viên <b>".$row[2]."</b> đã nghỉ buổi <b>".strtoupper($b)."</b>.Tổng số buổi nghỉ là <b>$nghi</b> buổi.Chúng tôi thông báo để phụ huynh biết tình hình đi học của con em mình.<br>Trân trọng thông báo,<br><b>No Hope Center</b>";
        $mail->addAddress($row[1]);
        $mail->send();
        $sqlUpdate = "update hocvien set $b = 0,nghi = $nghi where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
    }
    if(isset($_GET["giaovien"])){
        $giaovien = $_GET["giaovien"];
        $luong = $_GET["luong"];
        $sqlSelect = "select chuatra from giaovien where hoten = '$giaovien'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect));
        $chuatra = $row[0] + $luong;
        $sqlUpdate = "update giaovien set chuatra = $chuatra where hoten = '$giaovien'";
        mysqli_query($conn,$sqlUpdate);
    }


