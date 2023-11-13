<div id="main">

<?php
    include("sidebar/sidebar.php");
?>

<div class="maincontent">
    <?php
        if(isset($_GET['quanly'])){
            $tmp = $_GET['quanly'];
        } else {
            $tmp = '';
        }
        if($tmp == 'danhmucsanpham'){
            include("main/danhmucsanpham.php");
        }
        elseif($tmp == 'giohang'){
            include("main/giohang.php");
        }
        elseif($tmp == 'sanpham'){
            include("main/sanpham.php");
        }
        elseif($tmp == 'timkiem'){
            include("main/timkiem.php");
        }
        else{
            include("main/index.php");
        }
    ?>
</div>

</div>