<?php
    session_start();
    include("config/connect.php");
    if(isset($_POST['login_admin'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM admin WHERE username = '".$user."' AND password = '".$pass."' LIMIT 1 ";
        $row = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($row);
        if($count == 1){
            $_SESSION['login'] = $user;
            header("Location:index.php");
        } else {
            echo '<script>alert("Tài Khoản Hoặc Mật Khẩu Không Đúng! Vui Lòng Đăng Nhập Lại.")</script>';
        }
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_login.css">
    <title>Đăng Nhập Admin</title>
</head>

<body>
    <div class="login">
        <form action="" autocomplete="off" method="POST">
        <table class="table" border="1" style="text-align: center; border-collapse:collapse;border-color:#fff">
            <tr>
                <td colspan="2">ADMIN</td>
            </tr>
            <tr>
                <td><input type="text" placeholder="name..." name="username"></td>
            </tr>

            <tr>
                <td><input type="password" placeholder="pass..." name="password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="login_admin" value="LOGIN"></td>
            </tr>
        </table>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>