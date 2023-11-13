<?php
    $sql_sua = "SELECT * FROM danh_muc where id = '$_GET[id]' limit 1";
    $query_sua = mysqli_query($conn,$sql_sua);
?>

<p>Sửa Danh Mục Sản Phẩm</p>
<table border="1px" width="50%" style="border-collapse: collapse">
<form method="POST" action="modules/quanlyDMSP/xuly.php?id=<?php echo $_GET['id'] ?>">
    <?php
    while($dong = mysqli_fetch_array($query_sua)){
    ?>
  <tr>
    <td>Tên Danh Mục</td>
    <td><input type="text" value="<?php echo $dong['name'] ?>" name="tendanhmuc"></td>
  </tr>
  <tr>
    <td>Thứ Tự</td>
    <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa Danh Mục Sản Phẩm"></td>
  </tr>
    <?php
    }
    ?>
  </form>
</table>