<?php
$sql_lietke_dh = "SELECT * FROM don_hang
                        INNER JOIN khach_hang on don_hang.id_kh = khach_hang.id_kh
                        order by don_hang.id_dh";
$query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);
?>

<p style="margin-left:6px">Đơn Hàng</p>
<table border="1" width="100%" style="border-collapse: collapse;text-align: center">
    <tr>
        <td>ID</td>
        <td>Tên Khách Hàng</td>
        <td>Số Điện Thoại</td>
        <td>Email</td>
        <td>Địa Chỉ</td>
        <td>Mã Đơn Hàng</td>
        <td>Tình Trạng Đơn Hàng</td>
        <td>Thời Gian</td>
        <td>Quản Lý</td>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
    ?>
        <tr class="danhmuc_sp">
            <td><?php echo $i ?></td>
            <td><?php echo $row['ten_kh'] ?></td>
            <td><?php echo $row['so_dt'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['dia_chi'] ?></td>
            <td><?php echo $row['id_dh'] ?></td>
            <td>
                <?php
                if ($row['tinh_trang_dh'] == 1) {
                    echo "Chưa Xác Nhận";
                } elseif($row['tinh_trang_dh'] == 2) {
                    echo "Đã Xác Nhận";
                } elseif($row['tinh_trang_dh'] == 3) {
                    echo "Đang Giao Hàng";
                } elseif($row['tinh_trang_dh'] == 4) {
                    echo "Đã Nhận Hàng Và Thanh Toán";
                } else {
                    echo "Hàng Bị Hoàn Về";
                }
                ?>
            </td>
            <td><?php echo $row['thoi_gian'] ?></td>
            <td>
                <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['id_dh'] ?>">Xem Đơn Hàng</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
