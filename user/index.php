<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="library/style.css">
    <script src="library/jquery.js"></script>
</head>
<body>
    <?php 
        session_start();
        require "../connection.php";
        global $conn;
        $sqlLopHoc = "SELECT * FROM `lophoc`";
        $query = mysqli_query($conn, $sqlLopHoc);
        $lophoc = array();
        if(mysqli_num_rows($query) > 0){
            while($rows = mysqli_fetch_assoc($query)){
                $lophoc[] = $rows;
            }
        }
        if(isset($_GET['dangky'])){
            $sql = "INSERT INTO `quanlydangky`(`id`, `tenSV`, `tenMH`) VALUES ('')";
        }
    ?>
    <div id="wp-content">
        <div id="header">
            <div class="user">
                Xin chào " <span class="user_login"><?php echo isset($_SESSION['tenSV']) ? $_SESSION['tenSV'] : "" ?></span> "<span> | <a href="logout.php">Đăng xuất</a></span>
            </div>
        </div>
        <div id="content">
            <table border="1">
                <tr>
                    <td>Thời khóa biểu</td>
                    <td>Thứ 2</td>
                    <td>Thứ 3</td>
                    <td>Thứ 4</td>
                    <td>Thứ 5</td>
                    <td>Thứ 6</td>
                    <td>Thứ 7</td>
                    <td>Chủ nhật</td>
                </tr>
                <tr>
                    <td>Sáng</td>
                    <?php
                        foreach($lophoc as $keyMonHoc => $itemLopHoc){
                            if($itemLopHoc['buoi'] == "Sáng"){
                                echo 
                                    "<td>
                                        <p>{$itemLopHoc['tenLopHoc']}</p>
                                        <p><b>{$itemLopHoc['tenMonHoc']} ({$itemLopHoc['thoiGian']})</b></p>
                                        <p><b>{$itemLopHoc['diaDiem']}</b></p>
                                        <a href='?dangky={$itemLopHoc['maLopHoc']}'>Đăng ký</a>
                                    </td>";
                            }
                            else{
                                echo "<td>Trống</td>";
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <td>Chiều</td>
                    <?php
                        foreach($lophoc as $keyMonHoc => $itemLopHoc){
                            if($itemLopHoc['buoi'] == "Chiều"){
                                echo 
                                    "<td>
                                        <p>{$itemLopHoc['tenLopHoc']}</p>
                                        <p><b>{$itemLopHoc['tenMonHoc']} ({$itemLopHoc['thoiGian']})</b></p>
                                        <p><b>{$itemLopHoc['diaDiem']}</b></p>
                                        <a href=''>Đăng ký</a>
                                    </td>";
                            }
                            else{
                                echo "<td>Trống</td>";
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <td>Tối</td>
                    <?php
                        foreach($lophoc as $keyMonHoc => $itemLopHoc){
                            if($itemLopHoc['buoi'] == "Tối"){
                                echo 
                                    "<td>
                                        <p>{$itemLopHoc['tenLopHoc']}</p>
                                        <p><b>{$itemLopHoc['tenMonHoc']} ({$itemLopHoc['thoiGian']})</b></p>
                                        <p><b>{$itemLopHoc['diaDiem']}</b></p>
                                        <a href=''>Đăng ký</a>
                                    </td>";
                            }
                            else{
                                echo "<td>Trống</td>";
                            }
                        }
                    ?>
                </tr>
            </table>
        </div>
    </div>
    <!-- <script>
        $(document).ready(function(){
            $("a").click(function(){

            })
        });
    </script> -->
</body>
</html>