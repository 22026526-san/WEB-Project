<?php
include("../../admin/config/connect.php");
session_start();
if (isset($_POST['xacnhan'])) {
    $ten_kh = $_POST['hovaten'];
    $so_dt = $_POST['sodt'];
    $email = $_POST['email'];
    $dia_chi = $_POST['diachi'];
    $check = false;
    if ($ten_kh != '' && $so_dt != '' && $dia_chi != '' && $email != '') {
        $sql = "INSERT INTO khach_hang(ten_kh,dia_chi,so_dt,email) VALUE('" . $ten_kh . "','" . $dia_chi . "','" . $so_dt . "','" . $email . "')";
        $sql_thongtin = mysqli_query($conn, $sql);
        $check = true;
        $_SESSION['id_kh'] = mysqli_insert_id($conn);
        include("../main/donhang.php");
    }
    if ($check == true) {
        echo '<script>alert("Xác Nhận Đơn Hàng Thành Công,Chúng Tôi Sẽ Liên Hệ Với Bạn Trong Thời Gian Sớm Nhất.")</script>';
    } else {
        echo '<script>alert("Vui Lòng Điền Thông Tin Của Bạn.")</script>';
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style_thongtin.css">
    <title>Thông Tin Khách Hàng</title>
</head>

<body>
    <div class="thongtin">
        <form action="" autocomplete="off" method="POST">
            <table class="table" border="1" style="text-align: center; border-collapse:collapse;border-color: #fff">
                <tr>
                    <td colspan="2">Thông Tin Khách Hàng</td>
                </tr>
                <tr>
                    <td><input type="text"  placeholder="họ và tên.." name="hovaten"></td>
                </tr>

                <tr>
                    <td><input type="text"  placeholder="số điện thoại.." name="sodt"></td>
                </tr>
                <tr>
                    <td><input type="text"  placeholder="email.." name="email"></td>
                </tr>
                <tr>
                    <td><input type="text"  placeholder="địa chỉ.." name="diachi"></td>
                </tr>
                <tr>
                    <td colspan="2"><input  type="submit" name="xacnhan" value="Xác Nhận"></td>
                </tr>
            </table>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>