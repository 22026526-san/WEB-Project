<?php
$sql_mota = "SELECT * FROM san_pham inner join danh_muc  where san_pham.id_dm = danh_muc.id and san_pham.id_sp = '$_GET[id]' limit 1";
$query_mota = mysqli_query($conn, $sql_mota);
while ($row = mysqli_fetch_array($query_mota)) {
?>
    <div class="wrapper_mota">
        <div class="hinh_anh_sp">
            <img width="100%" src="admin/modules/quanlySP/uploads/<?php echo $row['hinh_anh'] ?>">
        </div>
        <form action="pages/main/themgiohang.php?id_sp=<?php echo $row['id_sp'] ?>" method="POST">
            <div class="mo_ta">
                <h3 style="margin: 0;"><?php echo $row['ten_sp'] ?></h3>
                <p>Mã Sản Phẩm : <?php echo $row['ma_sp'] ?></p>
                <p>Tình Trạng :
                    <?php
                    if ($row['tinh_trang'] == 1) {
                        echo 'Mới';
                    } else {
                        echo 'Đã Qua Sử Dụng';
                    }
                    ?>
                </p>
                <p>Số Lượng : <?php echo $row['so_luong'] ?></p>
                <p>Giá Sản Phẩm : <?php echo number_format($row['gia_sp'],0,',','.') ?></p>
                <p><input class="button" name="themgiohang" type="submit" value="Thêm Giỏ Hàng"></p>
            </div>
            <div style="clear: both;"></div>
            <p><?php echo $row['mo_ta'] ?></p>
        </form>
    </div>
<?php
}
?>