<?php
    if(isset($_GET["tk"])){
        $tk = $_GET["tk"];
        $sqlSelect = "select * from giaovien where tk ='$tk'";
        $result = mysqli_query($conn,$sqlSelect) or die("Lỗi câu truy vấn");
        $row = mysqli_fetch_row($result);
        $taikhoan = $row[0];
    }
    if(isset($_POST["capnhat"])){
        $matkhau = $_POST["matkhau"];
        $hoten = $_POST["hoten"];
        $ngaysinh = $_POST["ngaysinh"];
        if(isset($_POST["gioitinh"])){
            $gioitinh = $_POST["gioitinh"];
        }
        else{
            $gioitinh = "Null";
        }
        $sodienthoai = $_POST["sodienthoai"];
        $trinhdo = $_POST["trinhdo"];
        if(isset($_FILES["avatar"]["name"])) {
            if($_FILES["avatar"]["name"]==""){
                $avatar = $row[7];
            }
            else{
                $avatar = "../uploads/".$_FILES["avatar"]["name"];
                move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatar);
            }
        }
        $sqlUpdate = "UPDATE giaovien SET mk='$matkhau',hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sodienthoai',trinhdo='$trinhdo',avatar='$avatar' WHERE tk='$taikhoan'";
        mysqli_query($conn,$sqlUpdate) or die("Lỗi truy vấn");
        $sqlUpdateTV = "update thanhvien set mk = '$matkhau' where tk = '$taikhoan'";
        mysqli_query($conn,$sqlUpdateTV);
        header("location:admin_giaovien.php");
    }
?>
<div class="col-md-8 col-md-offset-2">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <b class="material-icons">account_box</b>
        </div>
        <div class="card-content">
            <h4 class="card-title">Sửa thông tin giáo viên</h4>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group label-floating">
                            <label class="control-label">Tài khoản</label>
                            <input type="text" class="form-control" value="<?php echo $row[0]?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group label-floating">
                            <label class="control-label">Mật khẩu</label>
                            <input type="password" class="form-control" value="123456789" name="matkhau">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Họ tên</label>
                            <input type="text" class="form-control" value="<?php echo $row[2]?>" name="hoten">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Ngày sinh</label>
                            <input type="text" class="form-control" value="<?php echo $row[3]?>" name="ngaysinh" ">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" class="form-control" value="<?php echo $row[5]?>" name="sodienthoai">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Trình độ</label>
                            <input type="text" class="form-control" value="<?php echo $row[6]?>" name="trinhdo">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="radio">
                            <label class="radio">
                                <input type="radio" name="gioitinh" value="Nam" <?php if($row[4]=="Nam"){ echo "checked";}?>>
                                Nam
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gioitinh" value="Nữ" <?php if($row[4]=="Nữ"){ echo "checked";}?>>
                                Nữ
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img id="image" class="img-rounded" src="<?php echo $row[7]?>">
                        <div class="btn btn-primary btn-round btn-file">
                            <div class="fileinput-new">
                                <i class="material-icons">image</i>
                                Sửa ảnh
                            </div>
                            <input type="file" id="avatar" name="avatar" onchange="loadanh()">
                        </div>
                    </div>
                </div>
                <br> <br>
                <div class="col-md-1 col-md-offset-9">
                    <button type="submit" class="btn btn-rose" name="capnhat">Sửa thông tin</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function loadanh() {
        var image = URL.createObjectURL(document.getElementById("avatar").files[0]);
        document.getElementById("image").setAttribute('src', image);
    }
</script>

