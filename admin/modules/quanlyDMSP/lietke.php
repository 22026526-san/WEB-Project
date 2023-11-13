<?php
    $sql_lietke = "SELECT * FROM danh_muc order by thutu";
    $query_lietke = mysqli_query($conn,$sql_lietke);
?>

<p style="margin-left:6px">Liệt Kê Danh Mục Sản Phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;text-align: center">
  <tr>
    <td>ID</td>
    <td>Tên Danh Mục</td>
    <td>Quản Lý</td>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke)){
    $i++;
  ?>
  <tr class="danhmuc_sp">
    <td><?php echo $i ?></td>
    <td><?php echo $row['name'] ?></td>
    <td>
        <a href="?action=quanlydanhmucsanpham&query=sua&id=<?php echo $row['id'] ?>">Sửa</a> | <a href="modules/quanlyDMSP/xuly.php?id=<?php echo $row['id'] ?>">Xóa</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>