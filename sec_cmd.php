<?php
if(isset($_GET['ping'])){
    $command = $_GET['ping'];
    $whitelist = "/^[a-zA-Z1-9.]+$/";
    if(!preg_match($whitelist,$command)){
        die("ký tự nguy hiểm nhập lại");
    }
    $ping = escapeshellarg($command);
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
        