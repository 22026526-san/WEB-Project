<?php
if ($_POST['timkiem']) {
    $tukhoa = $_POST['tukhoa'];
} else {
    $tukhoa = '';
}
$sql_pro = "SELECT * FROM san_pham where san_pham.ten_sp like '%".$tukhoa."%' ";
$query_pro = mysqli_query($conn, $sql_pro);
?>
<div>
    <h1 class="title-page">
        <span>Tìm Kiếm [ <?php echo $_POST['tukhoa']?> ]</span>
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
                <p class="price_product"><?php echo number_format($row['gia_sp'], 0, ',', '.') ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>