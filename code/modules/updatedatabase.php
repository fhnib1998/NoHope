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
        $hocphif = $_GET["hocphi"];
        $hocphi = str_replace(",","","$hocphif");
        $luongf = $_GET["luong"];
        $luong = str_replace(",","","$luongf");
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
        $lop = $_GET["lop"];
        $sqlSelectL = "select hocphi from lop where tenlop = '$lop'";
        $rowL = mysqli_fetch_row(mysqli_query($conn,$sqlSelectL));
        $hocphi = $rowL[0];
        $sqlSelect = "select hoc,chuanop,giamgia from hocvien where tk = '$taikhoan'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect));
        $hoc = $row[0] + 1;
        $chuanop = $row[1] + $hocphi - $hocphi*$row[2]/100;
        $sqlUpdate = "update hocvien set hoc = $hoc,chuanop = $chuanop where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlSelectD = "select dd from diemdanh where tk = '$taikhoan' and lop = '$lop' and buoi = $b";
        if($rowD = mysqli_fetch_row(mysqli_query($conn,$sqlSelectD))){
            $sqlUpdateD = "update diemdanh set dd = 1 where tk = '$taikhoan' and lop = '$lop' and buoi = $b";
            mysqli_query($conn,$sqlUpdateD);
        }else{
            $sqlInsert = "insert into diemdanh(tk,lop,buoi,dd) values('$taikhoan','$lop',$b,1)";
            mysqli_query($conn,$sqlInsert);
        }
        $sqlSelectHL = "select hoc,chuanop from hocvienlop where tk='$taikhoan' and lop = '$lop'";
        if($rowHL = mysqli_fetch_row(mysqli_query($conn,$sqlSelectHL))){
            $hocHL = $rowHL[0] + 1;
            $chuanopHL = $rowHL[1] + $hocphi - $hocphi*$row[2]/100;
            $sqlUpdateHL = "update hocvienlop set hoc = $hocHL,chuanop = $chuanopHL where tk = '$taikhoan' and lop = '$lop'";
            mysqli_query($conn,$sqlUpdateHL);
        }else{
            $chuanopHL = $hocphi - $hocphi*$row[2]/100;
            $sqlInsertHL = "insert into hocvienlop(tk,lop,hoc,chuanop) values('$taikhoan','$lop',1,$chuanopHL)";
            mysqli_query($conn,$sqlInsertHL);
        }
    }
    if(isset($_GET["tkdd1b"])){
        $taikhoan = $_GET["tkdd1b"];
        $b = $_GET["b"];
        $lop = $_GET["lop"];
        $sqlSelectL = "select hocphi from lop where tenlop = '$lop'";
        $rowL = mysqli_fetch_row(mysqli_query($conn,$sqlSelectL));
        $hocphi = $rowL[0];
        $sqlSelect = "select hoc,chuanop,giamgia,nghi from hocvien where tk = '$taikhoan'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect));
        $hoc = $row[0] + 1;
        $nghi = $row[3] - 1;
        $chuanop = $row[1]+ $hocphi - $hocphi*$row[2]/100;
        $sqlUpdate = "update hocvien set hoc = $hoc,chuanop = $chuanop,nghi=$nghi where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlUpdateD = "update diemdanh set dd = 1 where tk = '$taikhoan' and lop = '$lop' and buoi = $b";
        mysqli_query($conn,$sqlUpdateD);
        $sqlSelectHL = "select hoc,nghi,chuanop from hocvienlop where tk='$taikhoan' and lop = '$lop'";
        $rowHL = mysqli_fetch_row(mysqli_query($conn,$sqlSelectHL));
        $hocHL = $rowHL[0] + 1;
        $nghiHL = $rowHL[1] - 1;
        $chuanopHL = $rowHL[2] + $hocphi - $hocphi*$row[2]/100;
        $sqlUpdateHL = "update hocvienlop set hoc = $hocHL,nghi = $nghiHL,chuanop = $chuanopHL where tk = '$taikhoan' and lop = '$lop'";
        mysqli_query($conn,$sqlUpdateHL);
    }
    if(isset($_GET["tkdd0"])){
        $taikhoan = $_GET["tkdd0"];
        $b = $_GET["b"];
        $lop = $_GET["lop"];
        $sqlSelect = "select nghi,gmail,hoten from hocvien where tk = '$taikhoan'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect));
        $nghi = $row[0] + 1;
        $sqlUpdate = "update hocvien set nghi = $nghi where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        if($rowD = mysqli_fetch_row(mysqli_query($conn,$sqlSelectD))){
            $sqlUpdateD = "update diemdanh set dd = 0 where tk = '$taikhoan' and lop = '$lop' and buoi = $b";
            mysqli_query($conn,$sqlUpdateD);
        }else{
            $sqlInsert = "insert into diemdanh(tk,lop,buoi,dd) values('$taikhoan','$lop',$b,0)";
            mysqli_query($conn,$sqlInsert);
        }
        $sqlSelectHL = "select nghi from hocvienlop where tk='$taikhoan' and lop = '$lop'";
        if($rowHL = mysqli_fetch_row(mysqli_query($conn,$sqlSelectHL))){
            $nghiHL = $rowHL[0] + 1;
            $sqlUpdateHL = "update hocvienlop set nghi = $nghiHL where tk = '$taikhoan' and lop = '$lop'";
            mysqli_query($conn,$sqlUpdateHL);
        }else{
            $sqlInsertHL = "insert into hocvienlop(tk,lop,nghi) values('$taikhoan','$lop',1)";
            mysqli_query($conn,$sqlInsertHL);
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
        $mail->Subject = "Thông báo học viên nghỉ học";
        $mail->Body = "No Hope Center xin thông báo:<br> Học viên <b>".$row[2]."</b> đã nghỉ buổi <b>".strtoupper($b)."</b>.Tổng số buổi nghỉ là <b>$nghi</b> buổi.Chúng tôi thông báo để phụ huynh biết tình hình đi học của con em mình.<br>Trân trọng thông báo,<br><b>No Hope Center</b>";
        $mail->addAddress($row[1]);
        $mail->send();
    }
    if(isset($_GET["tkdd0b"])){
        $taikhoan = $_GET["tkdd0b"];
        $b = $_GET["b"];
        $lop = $_GET["lop"];
        $sqlSelectL = "select hocphi from lop where tenlop = '$lop'";
        $rowL = mysqli_fetch_row(mysqli_query($conn,$sqlSelectL));
        $hocphi = $rowL[0];
        $sqlSelect = "select nghi,gmail,hoten,hoc,chuanop,giamgia from hocvien where tk = '$taikhoan'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect));
        $nghi = $row[0] + 1;
        $hoc = $row[3] - 1;
        $chuanop = $row[4] - $hocphi + $hocphi*$row[5]/100;
        $sqlUpdate = "update hocvien set nghi = $nghi,hoc = $hoc,chuanop=$chuanop where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlUpdateD = "update diemdanh set dd = 0 where tk = '$taikhoan' and lop = '$lop' and buoi = $b";
        mysqli_query($conn,$sqlUpdateD);
        $sqlSelectHL = "select hoc,nghi,chuanop from hocvienlop where tk='$taikhoan' and lop = '$lop'";
        $rowHL = mysqli_fetch_row(mysqli_query($conn,$sqlSelectHL));
        $hocHL = $rowHL[0] - 1;
        $nghiHL = $rowHL[1] + 1;
        $chuanopHL = $rowHL[2] - $hocphi + $hocphi*$row[5]/100;
        $sqlUpdateHL = "update hocvienlop set hoc = $hocHL,nghi = $nghiHL,chuanop = $chuanopHL where tk = '$taikhoan' and lop = '$lop'";
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
        $mail->Subject = "Thông báo học viên nghỉ học";
        $mail->Body = "No Hope Center xin thông báo:<br> Học viên <b>".$row[2]."</b> đã nghỉ buổi <b>".$b."</b>.Tổng số buổi nghỉ là <b>$nghi</b> buổi.Chúng tôi thông báo để phụ huynh biết tình hình đi học của con em mình.<br>Trân trọng thông báo,<br><b>No Hope Center</b>";
        $mail->addAddress($row[1]);
        $mail->send();
    }
    if(isset($_GET["giaovien"])){
        $giaovien = $_GET["giaovien"];
        $luong = $_GET["luong"];
        $sqlSelect = "select chuatra,sobuoiday from giaovien where hoten = '$giaovien'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect));
        $chuatra = $row[0] + $luong;
        $sobuoiday = $row[1] + 1;
        $sqlUpdate = "update giaovien set chuatra = $chuatra,sobuoiday = $sobuoiday where hoten = '$giaovien'";
        mysqli_query($conn,$sqlUpdate);
    }
    if(isset($_GET["dongtenlop"])){
        $tenlop = $_GET["dongtenlop"];
        $sqlUpdate = "update lop set dong = 1 where tenlop = '$tenlop'";
        mysqli_query($conn,$sqlUpdate);
        $sqlSelect = "Select tk,lop from giaovien where lop like '%$tenlop%'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect));
        $taikhoan = $row[0];
        $lop = $row[1];
        $lopmoi = str_replace("$tenlop,","","$lop");
        $sqlUpdate = "Update giaovien set lop ='$lopmoi' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
    }
    if(isset($_GET["motenlop"])){
        $tenlop = $_GET["motenlop"];
        $sqlUpdate = "update lop set dong = 0 where tenlop = '$tenlop'";
        mysqli_query($conn,$sqlUpdate);
        $sqlSelect = "Select tk,lop from giaovien where hoten = '$giaovien'";
        $result = mysqli_query($conn,$sqlSelect);
        $row = mysqli_fetch_row($result);
        $taikhoan = $row[0];
        $lop = $tenlop.", ".$row[1];
        $sqlUpdate = "Update giaovien set lop ='$lop' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
    }
    if(isset($_GET["tkhvl"])){
        $taikhoan = $_GET["tkhvl"];
        $lop = $_GET["lop"];
        $sqlSelect = "select lop from hocvien where tk = '$taikhoan'";
        $row = mysqli_fetch_row(mysqli_query($conn,$sqlSelect));
        $lopM = $row[0]." ".$lop;
        $sqlUpdate = "update hocvien set lop = '$lopM' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdate);
        $sqlSelectL = "select siso from lop where tenlop = '$lop'";
        $rowL = mysqli_fetch_row(mysqli_query($conn,$sqlSelectL));
        $siso = $rowL[0] + 1;
        $sqlUpdateL = "update lop set siso = $siso where tenlop = '$lop'";
        mysqli_query($conn,$sqlUpdateL);
    }
