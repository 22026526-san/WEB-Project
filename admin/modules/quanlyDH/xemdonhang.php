<?php
$sql_lietke_dh = "SELECT * FROM san_pham
                        INNER JOIN chi_tiet_don_hang on san_pham.id_sp = chi_tiet_don_hang.id_sp
                        WHERE chi_tiet_don_hang.id_dh = '$_GET[code]'
                        order by san_pham.id_sp";
$query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);
?>

<p style="margin-left:6px">Chi Tiết Đơn Hàng</p>
<table border="1" width="100%" style="border-collapse: collapse;text-align: center">
    <tr>
        <td>ID</td>
        <td>Tên Sản Phẩm</td>
        <td>Mã Sản Phẩm</td>
        <td>Tình Trạng Sản Phẩm</td>
        <td>Giá</td>
        <td>Số Lượng Đặt Hàng</td>
        <td>Thành Tiền</td>
    </tr>
    <?php
    $i = 0;
    $sum = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
    ?>
        <tr class="danhmuc_sp">
            <td><?php echo $i ?></td>
            <td><?php echo $row['ten_sp'] ?></td>
            <td><?php echo $row['ma_sp'] ?></td>
            <td>
                <?php
                if ($row['tinh_trang'] == 1) {
                    echo "Mới";
                } else {
                    echo "Đã Qua Sử Dụng";
                }
                ?>
            </td>
            <td><?php echo $row['gia_sp'] ?></td>
            <td><?php echo $row['so_luong_dh'] ?></td>
            <td><?php echo number_format($row['gia_sp'] * $row['so_luong_dh'], 0, ',', '.') ?></td>
        </tr>
    <?php
        $sum += $row['gia_sp'] * $row['so_luong_dh'];
    }
    ?>
    <tr>
        <td colspan="7">
            <p style="float:left;margin-left:10px">Tổng Tiền :</p>
            <p style="float: right;margin-right:52px"><?php echo number_format($sum, 0, ',', '.') ?></p>
        </td>
    </tr>
</table>