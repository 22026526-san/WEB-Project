<?php
$sql_danhmuc = "SELECT * FROM danh_muc ORDER BY id";
$query_dm = mysqli_query($conn, $sql_danhmuc);
?>

<div class="menu">
  <ul class="list_menu">
    <li><img src="../images/logo.png"></li>
    <li><a href="index.php">Trang Chủ</a></li>
    <?php
    while ($row_dm = mysqli_fetch_array($query_dm)) {
    ?>
      <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_dm['id'] ?>"><?php echo $row_dm['name'] ?></a></li>
    <?php
    }
    ?>
    <li><a href="index.php?quanly=giohang">Giỏ Hàng</a></li>
    <li>
      <form action="index.php?quanly=timkiem" && method="POST">
      <input type="text" placeholder="Tìm Kiếm" name="tukhoa">
      <input type="submit" name="timkiem" value="Tìm Kiếm">
      </form>
    </li>
  </ul>
</div>