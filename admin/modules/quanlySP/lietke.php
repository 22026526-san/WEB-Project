<?php
    $sql_lietke = "SELECT * FROM san_pham INNER JOIN danh_muc WHERE danh_muc.id = san_pham.id_dm order by id_sp";
    $query_lietke = mysqli_query($conn,$sql_lietke);
?>

<p style="margin-left:6px">Liệt Sản Phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;text-align: center">
  <tr>
    <td>ID</td>
    <td>Tên Sản Phẩm</td>
    <td>Hình Ảnh</td>
    <td>Giá </td>
    <td>Số Lượng</td>
    <td>Danh Mục Sản Phẩm</td>
    <td>Mã Sản Phẩm</td>
    <td>Tình Trạng</td>
    <td>Quản Lý</td>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke)){
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['ten_sp'] ?></td>
    <td><img src="modules/quanlySP/uploads/<?php echo $row['hinh_anh'] ?>" width="150px" ></td>
    <td><?php echo number_format($row['gia_sp'], 0, ',', '.') ?></td>
    <td><?php echo $row['so_luong'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['ma_sp'] ?></td>
    <td><?php if ($row['tinh_trang'] == 1) {
        echo 'Mới';
      } else {
        echo 'Đã Qua Sử Dụng';
      } ?>
    </td>
    <td class="sanpham">
        <a href="?action=quanlysanpham&query=sua&id=<?php echo $row['id_sp'] ?>">Sửa</a> | <a href="modules/quanlySP/xuly.php?id=<?php echo $row['id_sp'] ?>">Xóa</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>