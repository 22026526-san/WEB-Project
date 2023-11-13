<?php
    include("../../config/connect.php");
    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];
    if(isset($_POST['themdanhmuc'])){
       $sql_them = "INSERT INTO danh_muc(name,thutu) VALUE('".$tenloaisp."','".$thutu."')"; 
       mysqli_query($conn,$sql_them);
       header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    } elseif(isset($_POST['suadanhmuc'])){
        $id = $_GET['id'];
        $sql_update = "UPDATE danh_muc SET name='".$tenloaisp."' , thutu='".$thutu."' WHERE id = '".$id."' "; 
        mysqli_query($conn,$sql_update);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }else {
        $id = $_GET['id'];
        $sql_xoa = "DELETE FROM danh_muc WHERE id = '".$id."' ";
        mysqli_query($conn,$sql_xoa);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
?>