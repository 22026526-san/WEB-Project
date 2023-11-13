<?php
    $id_kh = $_SESSION['id_kh'];
    $insert_dh = "INSERT INTO don_hang(id_kh,tinh_trang_dh) VALUE('".$id_kh."',1)";
    $query_dh = mysqli_query($conn,$insert_dh);
    $_SESSION['id_dh'] = mysqli_insert_id($conn);
    $id_dh = $_SESSION['id_dh'];
    if ($query_dh) {
        //them don hang chi tiet
        foreach($_SESSION['cart'] as $key=>$value){
            $id_sp = $value['id'];
            $soluong = $value['soluong'];
            $insert_ctdh = "INSERT INTO chi_tiet_don_hang(id_dh,id_sp,so_luong_dh) VALUE('".$id_dh."','".$id_sp."','".$soluong."') ";
            mysqli_query($conn,$insert_ctdh);
        }
    }
    unset($_SESSION['cart'])
?>