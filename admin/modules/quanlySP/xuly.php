<?php
    include("../../config/connect.php");
    $tensp = $_POST['tensp'];
    $masp = $_POST['masp'];
    $giasp = $_POST['giasp'];
    $motasp = $_POST['motasp'];
    $soluong = $_POST['soluong'];
    $tinhtrang = $_POST['tinhtrang'];
    //xu ly anh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $id_dm = $_POST['danhmuc'];


    if(isset($_POST['themsanpham'])){
       $sql_them = "INSERT INTO san_pham(ten_sp,ma_sp,mo_ta,hinh_anh,so_luong,gia_sp,tinh_trang,id_dm) VALUE('".$tensp."','".$masp."','".$motasp."','".$hinhanh."','".$soluong."','".$giasp."','".$tinhtrang."','".$id_dm."')"; 
       mysqli_query($conn,$sql_them);
       move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
       header('Location:../../index.php?action=quanlysanpham&query=them');
    } elseif(isset($_POST['suasanpham'])){
        $id = $_GET['id'];
        if ($hinhanh!=null) {
            //them anh moi khi sua
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            //xoa hinh anh cu khi sua
            $sql = "SELECT * FROM san_pham WHERE id_sp = '".$id."' LIMIT 1 ";
            $query = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($query)) {
                unlink('uploads/'.$row['hinh_anh']);
            }
            $sql_update = "UPDATE san_pham SET ten_sp='".$tensp."' , ma_sp='".$masp."' , hinh_anh='".$hinhanh."' , gia_sp='".$giasp."' , mo_ta='".$motasp."' , so_luong='".$soluong."' , tinh_trang='".$tinhtrang."' , id_dm='".$id_dm."' WHERE id_sp = '".$id."' "; 
        }else{
            $sql_update = "UPDATE san_pham SET ten_sp='".$tensp."' , ma_sp='".$masp."' , gia_sp='".$giasp."' , mo_ta='".$motasp."' , so_luong='".$soluong."' , tinh_trang='".$tinhtrang."' , id_dm='".$id_dm."' WHERE id_sp = '".$id."' ";
        }
        mysqli_query($conn,$sql_update);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }else { 
        $id = $_GET['id'];
        $sql = "SELECT * FROM san_pham WHERE id_sp = '".$id."' LIMIT 1 ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/'.$row['hinh_anh']);
        }
        $sql_xoa = "DELETE FROM san_pham WHERE id_sp = '".$id."' ";
        mysqli_query($conn,$sql_xoa);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }
?>