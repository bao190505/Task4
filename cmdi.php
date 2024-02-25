<?php
if(isset($_POST['cmd'])){
    $command = $_POST['cmd'];
    system("timeout 3 ping -c 4 $command");
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
    <form action="cmdi.php" method="post" >
        <input type="text" id="cmd" name="cmd" placeholder="ping" >
    </form>
</body>
</html>