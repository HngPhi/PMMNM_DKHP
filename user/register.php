<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require "../connection.php";
        if(isset($_POST['btnDangKy'])){
            $error = array();
            if(empty($_POST['maSV'])){
                $error['maSV'] = "Không được để trống MaSV";
            }
            if(empty($_POST['username'])){
                $error['username'] = "Không được để trống Username";
            }
            if(empty($_POST['password'])){
                $error['password'] = "Không được để trống Password";
            }
            if(empty($_POST['confirm_password'])){
                $error['confirm_password'] = "Bạn cần xác nhận lại mật khẩu";
            }
            if($_POST['password'] != $_POST['confirm_password']){
                $error['confirm_password'] = "Mật khẩu không khớp";
            }
            $maSV = $_POST['maSV'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $phone = $_POST['phone'];
            if(empty($error)){
                $sql = "INSERT INTO user (`maSV`, `tenSV`, `password`, `sdt`) VALUES ('$maSV', '$username', '$password', '$phone')";
                mysqli_query($conn, $sql);
                echo "Đăng ký thành công";
            }
        }
    ?>
    <form method="POST">
        <h1>Đăng ký</h1>
        <label for="maSV">Mã SV</label><br>
        <input type="text" id="maSV" name="maSV">
        <?php echo isset($error['maSV']) ? $error['maSV'] : "" ?><br><br>

        <label for="username">Tên SV</label><br>
        <input type="text" id="username" name="username">
        <?php echo isset($error['username']) ? $error['username'] : "" ?><br><br>

        <label for="password">Mật khẩu</label><br>
        <input type="password" id="password" name="password">
        <?php echo isset($error['password']) ? $error['password'] : "" ?><br><br>

        <label for="confirm_password">Xác nhận mật khẩu</label><br>
        <input type="password" id="confirm_password" name="confirm_password">
        <?php echo isset($error['confirm_password']) ? $error['confirm_password'] : "" ?><br><br>

        <label for="phone">SĐT</label><br>
        <input type="text" id="phone" name="phone"><br><br>

        <div class="btnForm"><input type="submit" name="btnDangKy" value="Đăng ký"></div>
    </form>
</body>
</html>