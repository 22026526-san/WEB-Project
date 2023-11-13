<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = '';
}
if ($page == '' || $page == 1) {
    $start = 0;
} else {
    $start = ($page * 15) - 15;
}
$sql_pro = "SELECT * FROM san_pham inner join danh_muc  where san_pham.id_dm = danh_muc.id ORDER BY san_pham.id_sp limit $start,15";
$query_pro = mysqli_query($conn, $sql_pro);
?>
<div>
    <h1 class="title-page">
        <span>Trang Chủ</span>
    </h1>
</div>
<ul class="product_list">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sp'] ?>">
                <img src="admin/modules/quanlySP/uploads/<?php echo $row['hinh_anh'] ?>">
                <p class="title_product"><?php echo $row['ten_sp'] ?></p>
                <p class="price_product" style="color: #E95221;"><?php echo number_format($row['gia_sp'], 0, ',', '.') ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>
<div style="clear:both"></div>
<?php
$sql_trang = mysqli_query($conn, "SELECT * from san_pham");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count / 15);
?>
<ul class="list_trang">
    <?php
    for ($i = 1; $i <= $trang; $i++) {
    ?>
        <li><a
            <?php
            if ($page == $i) {
                echo 'style="color: #fff;background: #E95221"';
            } else {
                echo '';
            }            
            ?>
        href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php
    }
    ?>
</ul>