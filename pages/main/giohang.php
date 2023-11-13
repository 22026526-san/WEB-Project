<div>
    <h1 class="title-cart">
        <span>Giỏ Hàng Của Bạn</span>
    </h1>
</div>
<?php
session_start();
?>
<?php
if (isset($_SESSION['cart'])) {
?>
    <table class="table" border="1" style="border-color:#E95221">
        <?php
        $tongtien = 0;
        $i = 0;
        foreach ($_SESSION['cart'] as $cart_item) {
            $sum = $cart_item['soluong'] * $cart_item['gia'];
            $tongtien += $sum;
            $i++;
        ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $cart_item['tensp'] ?></td>
                <td><?php echo $cart_item['masp'] ?></td>
                <td><img src="admin/modules/quanlySP/uploads/<?php echo $cart_item['hinhanh'] ?>" width="150px"></td>
                <td>
                    <a class="cong" href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>" style="text-decoration: none;font-size: 20px;margin-right: 10px">+</a>
                    <?php echo $cart_item['soluong'] ?>
                    <a class="tru" href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>" style="text-decoration: none;font-size: 25px;margin-left: 10px">-</a>
                </td>
                <td><?php echo number_format($cart_item['gia'], 0, ',', '.') ?></td>
                <td><?php echo number_format($sum, 0, ',', '.') ?></td>
                <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>" style="text-decoration: none; color:black">Xóa</a></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="8">
                <h3 style="float:left;margin-left:68px">Tổng Tiền :</h3>
                <h3 style="float: right;margin-right:116px"><?php echo number_format($tongtien, 0, ',', '.') ?></h3>
            </td>
        </tr>
    </table>
    <form action="pages/main/thongtin.php">
        <p><input type="submit" value="Đặt Hàng" class="dat_hang"></p>
    </form>
<?php
} else {
?>
    <p class="erorr"><img src="../../images/erorr.png"></p>
<?php
}
?>