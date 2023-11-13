<?php
    $sql_sua = "SELECT * FROM san_pham where id_sp = '$_GET[id]' limit 1";
    $query_sua = mysqli_query($conn,$sql_sua);
?>

<p>Sửa Sản Phẩm</p>
<table border="1px" width="50%" style="border-collapse: collapse">
<?php
while($row = mysqli_fetch_array($query_sua)){
?>
  <form method="POST" action="modules/quanlySP/xuly.php?id=<?php echo $row['id_sp'] ?>" enctype="multipart/form-data">
  <tr>
    <td>Tên Sản Phẩm</td>
    <td><input type="text" value="<?php echo $row['ten_sp'] ?>" name="tensp"></td>
  </tr>
  <tr>
    <td>Mã Sản Phẩm</td>
    <td><input type="text" value="<?php echo $row['ma_sp'] ?>" name="masp"></td>
  </tr>
  <tr>
    <td>Hình Ảnh</td>
    <td>
      <input type="file" name="hinhanh">
      <img src="modules/quanlySP/uploads/<?php echo $row['hinh_anh'] ?>" width="150px">
    </td>
  </tr>
  <tr>
    <td>Giá Sản Phẩm</td>
    <td><input type="text" value="<?php echo $row['gia_sp'] ?>" name="giasp"></td>
  </tr>
  <tr>
    <td>Danh Mục Sản Phẩm</td>
    <td>
      <select name="danhmuc">
        <?php 
        $sql_danhmuc = "SELECT * FROM danh_muc ORDER BY id";
        $query_dm = mysqli_query($conn,$sql_danhmuc);
        while($row_dm = mysqli_fetch_array($query_dm)){
            if($row['id_dm'] == $row_dm['id']){
        ?>
        <option selected value="<?php echo $row_dm['id'] ?>"><?php echo $row_dm['name'] ?></option>
        <?php
            } else {
        ?>
        <option value="<?php echo $row_dm['id'] ?>"><?php echo $row_dm['name'] ?></option>
        <?php
            }  
        }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Mô Tả Sản Phẩm</td>
    <td><textarea name="motasp" rows="10" style="resize:none"><?php echo $row['mo_ta'] ?></textarea></td>
  </tr>
  <tr>
    <td>Số Lượng</td>
    <td><input type="text" value="<?php echo $row['so_luong'] ?>" name="soluong"></td>
  </tr>
  <tr>
    <td>Tình Trạng</td>
    <td>
      <select name="tinhtrang">
        <?php
          if($row['tinh_trang'] == 1){
        ?>
        <option value="1" selected>Mới</option>
        <option value="0">Đã Qua Sử Dụng</option>
        <?php
          }else{
        ?>
        <option value="1" selected>Mới</option>
        <option value="0" selected>Đã Qua Sử Dụng</option>
        <?php
          }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="suasanpham" value="Sửa Sản Phẩm"></td>
  </tr>
  </form>
<?php
}
?>
</table>