<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <?php
        session_start();
        require "../connection.php";
        $sql = "SELECT * FROM user";
        $query = mysqli_query($conn, $sql);
        $user = array();
        $temp = TRUE;
        if(isset($_POST['btnDangNhap'])){
            if(mysqli_num_rows($query)>0){
                while($row = mysqli_fetch_array($query)){
                    $user[] = $row;
                }
            }
            else{
                echo "Tài khoản không tồn tại";
            }
            $error = array();
            if(empty($_POST['maSV'])){
                $error['maSV'] = "Không được để trống MaSV";
            }
            if(empty($_POST['password'])){
                $error['password'] = "Không được để trống Password";
            }
            foreach($user as $item){
                if($item['maSV'] == $_POST['maSV'] && $item['password'] == md5($_POST['password'])){
                    $_SESSION['tenSV'] = $item['tenSV'];
                    $_SESSION['is_login'] = 1;
                    $temp = TRUE;
                    header("Location: index.php");
                }
            }
            if($temp == FALSE) echo "Đăng nhập thất bại";
        }
    ?>
    <form method="POST">
        <h1>Đăng nhập</h1>
        <label for="maSV">Mã SV</label><br>
        <input type="text" id="maSV" name="maSV">
        <?php echo isset($error['maSV']) ? $error['maSV'] : "" ?><br><br>

        <label for="password">Mật khẩu</label><br>
        <input type="password" id="password" name="password">
        <?php echo isset($error['password']) ? $error['password'] : "" ?><br><br>

        <a href="register.php">Bạn chưa có tài khoản?</a><br><br>

        <div class="btnForm"><input type="submit" name="btnDangNhap" value="Đăng nhập"></div>
    </form>
</body>
</html>