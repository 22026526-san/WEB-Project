<?php
    include("../../config/connect.php");
    $id = $_GET['code'];
    $tinh_trang_dh = $_POST['tinhtrang_dh'];
    if(isset($_POST['update'])){
        $sql_update = "UPDATE don_hang SET tinh_trang_dh='".$tinh_trang_dh."' WHERE id_dh = '".$id."'";
        mysqli_query($conn,$sql_update); 
        header('Location:../../index.php?action=quanlydonhang&query=lietke');
    }
?>