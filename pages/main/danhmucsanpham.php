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
$sql_pro = "SELECT * FROM san_pham where id_dm = '$_GET[id]' ORDER BY id_sp limit $start,15";
$query_pro = mysqli_query($conn, $sql_pro);
$sql_cate = "SELECT * FROM danh_muc where id = '$_GET[id]' limit 1";
$query_cate = mysqli_query($conn, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<div>
    <h1 class="title-page">
        <span>Trang Chủ > <?php echo $row_title['name'] ?></span>
    </h1>
</div>
<ul class="product_list">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sp'] ?>">
                <img src="admin/modules/quanlySP/uploads/<?php echo $row_pro['hinh_anh'] ?>">
                <p class="title_product"><?php echo $row_pro['ten_sp'] ?></p>
                <p class="price_product"><?php echo number_format($row_pro['gia_sp'],0,',','.') ?></p>
            </a>
        </li>
    <?php
    } 
    ?>
</ul>
<div style="clear:both"></div>
<?php
$sql_trang = mysqli_query($conn,"SELECT * FROM san_pham where id_dm = '$_GET[id]' ORDER BY id_sp");
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
        href="index.php?quanly=danhmucsanpham&id=<?php echo $row_title['id'] ?>&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php
    }
    ?>
</ul>