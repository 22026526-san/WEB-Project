<div class="clear"></div>
<div class="main">
<?php
        if(isset($_GET['action']) && $_GET['query']){
            $tmp = $_GET['action'];
            $query = $_GET['query'];
        } else {
            $tmp = '';
            $query = '';
        }
        if($tmp == 'quanlydanhmucsanpham' && $query == 'them'){
            include("modules/quanlyDMSP/them.php");
            include("modules/quanlyDMSP/lietke.php");
        }
        elseif ($tmp == 'quanlydanhmucsanpham' && $query == 'sua') {
            include("modules/quanlyDMSP/sua.php");  
        }
        elseif ($tmp == 'quanlysanpham' && $query == 'them') {
            include("modules/quanlySP/them.php"); 
            include("modules/quanlySP/lietke.php"); 
        }
        elseif ($tmp == 'quanlysanpham' && $query == 'sua') {
            include("modules/quanlySP/sua.php");  
        }
        elseif ($tmp == 'quanlydonhang' && $query == 'lietke') {
            include("modules/quanlyDH/lietke.php");  
        }
        elseif ($tmp == 'donhang' && $query == 'xemdonhang') {
            include("modules/quanlyDH/xemdonhang.php");  
        }
        else{
            include("modules/dashboard.php");
        }
    ?>
</div>