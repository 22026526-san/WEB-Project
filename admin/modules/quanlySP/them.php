<p style="margin-left:6px">Thêm Sản Phẩm</p>
<table border="1px" width="50%" style="border-collapse: collapse">
<form method="POST" action="modules/quanlySP/xuly.php" enctype="multipart/form-data">
  <tr>
    <td>Tên Sản Phẩm</td>
    <td><input type="text" name="tensp"></td>
  </tr>
  <tr>
    <td>Mã Sản Phẩm</td>
    <td><input type="text" name="masp"></td>
  </tr>
  <tr>
    <td>Hình Ảnh</td>
    <td><input type="file" name="hinhanh"></td>
  </tr>
  <tr>
    <td>Giá Sản Phẩm</td>
    <td><input type="text" name="giasp"></td>
  </tr>
  <tr>
    <td>Mô Tả Sản Phẩm</td>
    <td><textarea name="motasp" rows="10"></textarea></td>
  </tr>
  <tr>
    <td>Số Lượng</td>
    <td><input type="text" name="soluong"></td>
  </tr>
  <tr>
    <td>Danh Mục Sản Phẩm</td>
    <td>
      <select name="danhmuc">
        <?php 
        $sql_danhmuc = "SELECT * FROM danh_muc ORDER BY id";
        $query_dm = mysqli_query($conn,$sql_danhmuc);
        while($row_dm = mysqli_fetch_array($query_dm)){
        ?>
        <option value="<?php echo $row_dm['id'] ?>"><?php echo $row_dm['name'] ?></option>
        <?php  
        }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Tình Trạng</td>
    <td>
      <select name="tinhtrang">
        <option value="1">Mới</option>
        <option value="0">Đã Qua Sử Dụng</option>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="themsanpham" value="Thêm Sản Phẩm"></td>
  </tr>
  </form>
</table>