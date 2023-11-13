<?php
    session_start();
    include("../../admin/config/connect.php");
    //them so luong
    if(isset($_SESSION['cart']) && isset($_GET['cong'])){
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if ($cart_item['id'] != $id) {
                $product[] = array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                                'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $_SESSION['cart'] = $product;            
            } else {
                $new_soluong = $cart_item['soluong']+1;
                $product[] = array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$new_soluong,'gia'=>$cart_item['gia'],
                                'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $_SESSION['cart'] = $product; 
            }
        }
        header("Location:../../index.php?quanly=giohang"); 
    }
    //tru so luong
    if(isset($_SESSION['cart']) && isset($_GET['tru'])){
        $id = $_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if ($cart_item['id'] != $id) {
                $product[] = array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                                'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $_SESSION['cart'] = $product;            
            } else {
                if ($cart_item['soluong'] >= 2) {
                    $new_soluong = $cart_item['soluong']-1;
                    $product[] = array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$new_soluong,'gia'=>$cart_item['gia'],
                                'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                    $_SESSION['cart'] = $product;
                } 
            }
        }
        header("Location:../../index.php?quanly=giohang"); 
    }
    //xoa sp
    if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if ($cart_item['id'] != $id) {
                $product[] = array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                                'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
            $_SESSION['cart'] = $product;
            header("Location:../../index.php?quanly=giohang");
        }

    }
    //them sp
    if(isset($_POST['themgiohang'])){
        // session_destroy();
        $id = $_GET['id_sp'];
        $soluong = 1;
        $sql = "SELECT * From san_pham where id_sp = '".$id."' LIMIT 1";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        if ($row) {
            $new_product = array(array('tensp'=>$row['ten_sp'],'id'=>$id,'soluong'=>$soluong,'gia'=>$row['gia_sp'],
                    'hinhanh'=>$row['hinh_anh'],'masp'=>$row['ma_sp']));
            //kiem tra gio hang ton tai chua
            if (isset($_SESSION['cart'])) {
                $check = false;
                foreach($_SESSION['cart'] as $cart_item){
                    //neu du lieu trung
                    if($cart_item['id']==$id){
                        $product[] = array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'] + 1,'gia'=>$cart_item['gia'],
                                'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                        $check = true;
                    } else {
                        //neu du lieu k trung
                        $product[] = array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                                'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                    }
                }
                if ($check == false) {
                    //lien ket du lieu 
                    $_SESSION['cart'] = array_merge($product,$new_product);     
                } else {
                    $_SESSION['cart'] = $product;
                }
            } else {
                $_SESSION['cart'] = $new_product;
            }
        }
        header("Location:../../index.php?quanly=giohang");
    }
?>
