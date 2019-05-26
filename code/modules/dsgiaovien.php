<?php
    $sqlSelect = "select * from giaovien";
    $result = mysqli_query($conn,$sqlSelect) or die("Lỗi câu truy vấn");
    while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="col-md-4">
        <div class="card card-product">
            <div class="card-image" data-header-animation="true">
                <img class="img" src= <?php echo $row["avatar"];?>>
            </div>
            <div class="card-content">
                <div class="card-actions">
                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                        <i class="material-icons">build</i> Khôi phục ảnh
                    </button>
                    <button type="button" class="btn btn-default btn-simple" data-placement="bottom" data-toggle="modal" data-target="#thongtin<?php echo $row["tk"]?>" title="Chi tiết">
                        <i class="material-icons">art_track</i>
                    </button>
                    <a href="admin_giaovien.php?module=editgiaovien&tk=<?php echo $row["tk"];?>">
                        <button type="button" class="btn btn-success btn-simple" data-placement="bottom" title="Chỉnh sửa">
                            <i class="material-icons">edit</i>
                        </button>
                    </a>
                    <button type="button" class="btn btn-danger btn-simple" data-placement="bottom" title="Xóa" onclick="xacnhanxoa('<?php echo $row["tk"] ?>')">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <h3 class="card-title">
                    <?php echo $row["hoten"]; ?>
                </h3>
                <h4 class="card-description">
                    Ngày sinh: <?php echo $row["ngaysinh"];?><br>
                    Giới tính: <?php echo $row["gioitinh"];?><br>
                    SĐT: <?php echo $row["sdt"];?><br>
                    Trình độ: <?php echo $row["trinhdo"];?>
                </h4>
            </div>
        </div>
    </div>
        <div class="modal fade" id="thongtin<?php echo $row["tk"]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" "><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Thông tin giáo viên</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Họ tên</th>
                                <th><?php echo $row["hoten"]?></th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Ngày sinh</td>
                                    <td><?php echo $row["ngaysinh"]?></td>
                                </tr>
                                <tr>
                                    <td>Giới tính</td>
                                    <td><?php echo $row["gioitinh"]?></td>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td><?php echo $row["sdt"]?></td>
                                </tr>
                                <tr>
                                    <td>Trình độ</td>
                                    <td><?php echo $row["trinhdo"]?></td>
                                </tr>
                                <tr>
                                    <td>Lớp đang dạy</td>
                                    <td><?php echo $row["lop"]?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rose" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
<?php
}
?>

