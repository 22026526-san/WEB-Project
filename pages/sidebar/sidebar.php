<div class="sidebar">
    <ul class="list_sidebar">
        <?php
        $sql_danhmuc = "SELECT * FROM danh_muc ORDER BY id";
        $query_dm = mysqli_query($conn, $sql_danhmuc);
        while ($row = mysqli_fetch_array($query_dm)) {
        ?>
        <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></li>
        <?php
        }
        ?>
    </ul>
</div>