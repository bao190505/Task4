<?php
if(isset($_GET['ping'])){
    $command = $_GET['ping'];             // Lấy giá trị của trong form input
    $whitelist = "/^[a-zA-Z1-9.]+$/";     // tạo một whitelist những kí tự được cho phép.
    if(!preg_match($whitelist,$command)){ //kiểm tra có kí tự nào khác không nếu có cho dừng và xuất ra thông báo.
        die("ký tự nguy hiểm nhập lại");
    }
    $ping = escapeshellarg($command);     //kiểm ta thêm lần nữa bằng hàm escapeshellarg() rồi mới thực thi lệnh ping.
    $res = shell_exec("timeout 3 ping -c 4 $ping");
    echo $res;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMMAND INJECTION</title>
</head>
<body>
    <h2>PING</h2>
    <form action="sec_cmd.php" method="GET" >
        <input type="text" id="ping" name="ping" placeholder="ping" >
    </form>
</body>
</html>
        
